<?php
/**
 *  Video Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;
use App\Lib\Tool\UrlEncrypt;


class TagsLogic extends BaseLogic
{

    private $cacheTime = 600;

    /**
     * 获取标签排行榜
     * @param  int $limit
     * @return mixed
     */
    public  function getTagsRanking($limit = 10 )
    {
        if($this->openCache){
            $rankIngKey = 'tagsRanking_'.$limit;
            $data =  yield $this->getComm()->getRedis()->get($rankIngKey);
            if(!empty($data)){
                 return json_decode($data,true);
            };
        }
        $tagData = yield $this->service->getTagsService()->getTagsRanking($limit);
        foreach($tagData as $index => $item){
            $item['href'] = $this->getComm()->generateLinks('/tag/?tag=',$item['id']);
            $tagData[$index] = $item;
        }
        if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($rankIngKey, json_encode($tagData), $this->cacheTime);
        }
        return $tagData;
    }


    /**
     * 从URL中获取TagId
     * @param string $tag
     */
    public function getUrlTagId($tag='')
    {
        if(empty($tag)){
             $tag  =  $this->getContext()->getInput()->get('tag');
        }
        if(empty($tag)){
               return '';
          }
        $encObj = $this->getObject(UrlEncrypt::class);
        $tagId  = $encObj->decrypt_url($tag);
        return $tagId;
    }

    /**
     * 根据tagId获取视频信息
     * @param string $tagId
     * @param int $start
     * @param  int $limit
     */
    public function getVideoDataByTagId($tagId='',$start=0,$limit=10)
    {
        if($this->openCache){
            $key = 'video_data_tagid_'.$tagId.'_'.$start.'_'.$limit;
            $data =  yield $this->getComm()->getRedis()->get($key);
            if(!empty($data)){
                return  json_decode($data,true);
            };
        }
         $data = yield $this->service->getTagsService()->getVideoDataByTagId($tagId,$start,$limit);
         $videoLogic = $this->getObject(VideoLogic::class);
         $data = $videoLogic->tidyUpData($data);
         if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, json_encode($data), $this->cacheTime);
        }
         return $data;
    }

    /**
     * 根据tag_id获取视频总数
     * @param $tagId
     */
    public function getVideoCountByTagId($tagId)
    {
        if($this->openCache){
            $key = 'video_count_tagid_'.$tagId;
            $count =  yield $this->getComm()->getRedis()->get($key);
            if(!empty($count)){
                return  $count;
            };
        }
         $count  = yield $this->service->getTagsService()->getVideoCountByTagId($tagId);
         if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, $count, $this->cacheTime);
        }
        return $count;
    }

}

