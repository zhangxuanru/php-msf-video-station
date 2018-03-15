<?php
/**
 *  搜索助手
 *  Search  Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;
use App\Lib\Tool\UrlEncrypt;


class SearchLogic extends BaseLogic
{
    private  $cacheTime = 600;

    /**
     * 根据title与 keywords查询关键字
     * @param $keywords
     * @param $start
     * @param $limit
     * @return mixed
     */
    public function getSearchByKeyWords($keywords,$start=0,$limit=10)
    {
        $keywords = trim($keywords);
        $cacheKey = 'mult_catch_'.crc32($keywords).'_'.$start.'_'.$limit;
        if($this->openCache){
            $data = yield $this->getComm()->getRedis()->get($cacheKey);
            if(!empty($data)){
                return json_decode($data,true);
            }
        }
       $result =  yield $this->service->getSearchService()->searchMultiMatchByKeyWords($keywords,$start,$limit);        
        if(empty($result) || !is_array($result) || empty($result['hits']['total']) ){
            return [];
        }
        $data =  $this->processSearchData($result);
        if($this->openCache){
            yield  $this->getComm()->getRedis()->set($cacheKey, json_encode($data), $this->cacheTime);
        }
        return $data;
    }


    /**
     * 根据关键字查询 符合自动补全的结果
     * @param $keywords
     * @param int $start
     * @param int $limit
     */
    public function getSuggestSearchByKeyWords($keywords,$start=0,$limit=10)
    {
        $keywords = trim($keywords);
        $cacheKey = crc32($keywords).'_'.$start.'_'.$limit;
        if($this->openCache){
            $data = yield $this->getComm()->getRedis()->get($cacheKey);
            if(!empty($data)){
                 return json_decode($data,true);
            }
        }
        $result =  yield $this->service->getSearchService()->getSuggestSearchByKeyWords($keywords,$start,$limit);
        if(empty($result) || !is_array($result) || !isset($result['suggest']) || empty($result['suggest'])){
              return [];
        }
        $data = $this->processSuggestSearchData($result);
        if($this->openCache){
            yield  $this->getComm()->getRedis()->set($cacheKey, json_encode($data), $this->cacheTime);
        }
        return $data;
    }

    /**
     * 处理显示的关系字
     * @param $keywords
     * @return array
     */
    public function processKeyWord($keywords)
    {
        $keyArr[] = $keywords;
        //如果包含空格，则是或的关系
        if(strpos($keywords," ")){
            $keyArr = explode(" ",$keywords);
            $keyArr =  array_filter($keyArr);
        }
        return $keyArr;
    }

    /**
     * 手动拆词 拆成单个的小词
     * @param $keywords      
     */
   public function getProcessKeyWordsSearch($keywords)
   {
       $keyArr = str_split($keywords,1);
       $countArr = array_count_values($keyArr);
       $terms = [];
       foreach($countArr as $key => $value){
           if(!isset($countArr[$key])){
                continue;
           }   
           $keyList = array_keys($countArr,$value);
           if($keyList){
               $t = implode('',$keyList);
               if($t  != $keywords){
                  $terms[] = implode('',$keyList);
               }
               foreach($keyList as $index){
                   unset($countArr[$index]);
               }
           }
       }
       return  $terms;
   }


    /**
     * 处理搜索结果集
     * @param $result
     * @return mixed
     */
    public function processSearchData($result)
    {
        $data = $result['hits'];
        foreach($data['hits'] as $key => $val){
            unset($val['_index'],$val['_type'],$val['_id']);
            $val['_source']['_score'] = $val['_score'];
            $data[$key] = $val['_source'];
        }
        unset($data['hits'],$data['max_score']);
        return $data;
    }


    /**
     * 处理搜索自动补全结果集
     * @param $result
     */
    public function processSuggestSearchData($result)
    {
        $searchKeySuggest = isset($result['suggest']['search-key-suggest']) ? $result['suggest']['search-key-suggest'] : [];
        $searchTitSuggest = isset($result['suggest']['search-tit-suggest']) ? $result['suggest']['search-tit-suggest'] : [];
        $data = [];
        if(!empty($searchKeySuggest) && !empty($searchKeySuggest[0]['options'])){
            $options =  $searchKeySuggest[0]['options'];
            $data    =  array_column($options,'text');
        }
        if(!empty($searchTitSuggest) && !empty($searchTitSuggest[0]['options'])){
            $options =  $searchTitSuggest[0]['options'];
            $option  =  array_column($options,'text');
            $data    =  array_merge($data,$option);
        }
        $data = array_unique($data);
        $data = array_values($data);
        array_walk($data,function(&$value,$key){
            $list = explode(",",$value);
            $row  = array_chunk($list,4);
            $value = implode(' ',array_shift($row));
        });
        $data = array_slice($data,0,10);
        return $data;
    }

    /**
     * 根据搜索数据获取视频信息
     * @param array $data
     */
    public function getVideoDataBySearchData($data=[])
    {
        $list = [];
        $videoLogic = $this->getObject(VideoLogic::class);
        foreach($data as $key => $val){
            if(!is_array($val) || !isset($val['id'])){
                continue;
            }
            $list[] = yield $videoLogic->getVideoDataById($val['id']);
        }
        return $list;
    }

    /**
     * 检查搜索次数，一分钟只能搜10次
     */
    public function trySearchNumber()
    {
        $uuId = $this->getContext()->getInput()->getCookie('uuId');
        if(empty($uuId)){
            $uuId = uniqid();
            $this->getContext()->getOutput()->setCookie('uuId',$uuId,3600);
        }
        $cacheKey = $uuId;
        $data = yield $this->getComm()->getRedis()->get($cacheKey);
        if(!empty($data) && $data>=10){
             return false;
        }
        return true;
    }

}

