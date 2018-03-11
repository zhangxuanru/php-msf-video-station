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
    /**
     * 根据title与 keywords查询关键字
     * @param $keywords
     * @return mixed
     */
    public function getSearchByKeyWords($keywords,$start=0,$limit=10)
    {
       $keywords = trim($keywords);       
       $result =  yield $this->service->getSearchService()->searchMultiMatchByKeyWords($keywords,$start,$limit);        
        if(empty($result) || !is_array($result) || empty($result['hits']['total']) ){
            return [];
        }
        $data =  $this->processSearchData($result);
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
               $terms[] = implode('',$keyList);
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

}

