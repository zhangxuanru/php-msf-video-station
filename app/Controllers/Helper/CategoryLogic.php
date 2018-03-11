<?php
/**
 *  Category Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;
use App\Lib\Tool\UrlEncrypt;

class CategoryLogic extends BaseLogic
{
    private $cacheTime = 600;

    /**
     * 从URL中获取分类ID
     * @param string $cat
     */
    public function getUrlCateId($cat='')
    {
        if(empty($cat)){
            $cat = $this->getContext()->getInput()->get('cat');
        }
        if(empty($cat)){
                return '';
          }
        $encObj = $this->getObject(UrlEncrypt::class);
        $catId  = $encObj->decrypt_url($cat);
        return $catId;
    }

    /**
     * 根据tagId获取视频信息
     * @param string $catId
     * @param int $start
     * @param  int $limit
     */
    public function getVideoDataByCateId($catId='',$start=0,$limit=10)
    {
        if(empty($catId)){
               return [];
        }
        if($this->openCache){
            $catKey = sprintf("%u",crc32($catId));
            $key = 'video_data_cateid_'.$catKey.'_'.$start.'_'.$limit;
            $data =  yield $this->getComm()->getRedis()->get($key);
            if(!empty($data)){
                return  json_decode($data,true);
            };
        }
         $catIdArr = explode(',',$catId);
         $data = yield $this->service->getVideoService()->getVideoListByCategory($catIdArr,$start,$limit);
         $videoLogic = $this->getObject(VideoLogic::class);
         $data = $videoLogic->tidyUpData($data);
         if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, json_encode($data), $this->cacheTime);
        }
         return $data;
    }

    /**
     * 根据分类获取视频总数
     * @param $catId
     */
    public function getVideoCountByCatId($catId)
    {
        if($this->openCache){
            $catKey = sprintf("%u",crc32($catId));
            $key = 'video_count_catid_'.$catKey;
            $count =  yield $this->getComm()->getRedis()->get($key);
            if(!empty($count)){
                return  $count;
            };
        }
         $catIdArr = explode(',',$catId);
         $count  = yield $this->service->getVideoService()->getVideoCountByCatId($catIdArr);
         if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, $count, $this->cacheTime);
        }
        return $count;
    }

}

