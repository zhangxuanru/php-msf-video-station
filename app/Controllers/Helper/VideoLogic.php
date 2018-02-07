<?php
/**
 *  Video Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;
use App\Lib\Tool\Comm;
use App\Lib\Tool\UrlEncrypt;

class VideoLogic extends BaseLogic
{
    private  $width  = 854;
    private  $height = 478;
    private  $cacheTime = 600;

    /**
     * 获取置顶视频
     * @param $limit
     */
    public function getTopVideoData($limit)
    {
        if($this->openCache){
            $key  = 'topVideoKey_'.$limit;
            $data = yield $this->getComm()->getRedis()->get($key);
            if(!empty($data)){
                return json_decode($data,true);
            };
        }
        $videoList = yield $this->service->getVideoService()->getTopVideoData($limit);
        $videoList = $this->tidyUpData($videoList);
        if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, json_encode($videoList), $this->cacheTime);
        }
        return $videoList;
     }

    /**
     * 获取推荐视频
     * @param int $start
     * @param $limit
     * @param  $format
     * @return array
     */
    public function getRecommendVideoData($start=0,$limit,$format = true)
    {
        if($this->openCache){
            $prefix = ($format == true) ?  '1' : '0';
            $key  = 'recommendVideoKey_'.$start.'_'.$limit.'_'.$prefix;
            $data = yield $this->getComm()->getRedis()->get($key);
            if(!empty($data)){
                 return json_decode($data,true);
            };
        }
        $data = yield  $this->service->getVideoService()->getRecommendVideoData($start,$limit,true);
        if(empty($data)){
               return $data;
        }
        $data = $this->tidyUpData($data);
        if($format == false){
            if($this->openCache) {
                yield  $this->getComm()->getRedis()->set($key, json_encode($data), $this->cacheTime);
            }
            return $data;
        }
        $List['slideData'] = $data[0];
        unset($data[0]);
        $List['recommend'] = array_chunk($data,2);
        unset($data);
        if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($key, json_encode($List), $this->cacheTime);
        }
        return $List;
    }

    /**
     * 获取推荐视频总数
     */
    public function getRecommendVideoCount()
    {
        $count = yield  $this->service->getVideoService()->getRecommendVideoCount();
        return $count;
    }

    /**根据PID获取子栏目与相应的视频数据
     * @param int $pid
     * @param string $region
     * @param int $start
     * @param int $limit
     * @param bool $format
     */
    public function getModularList($pid=0,$region='3',$start=0,$limit=8,$format = true)
    {
        $modular = [];
        if($this->openCache){
            $modularKey = "nav_".$pid."_".$region;
            $data = yield $this->getComm()->getRedis()->get($modularKey);
            if(!empty($data)){
                $modular =  json_decode($data,true);
            };
        }
       if(empty($modular)){
          $modular = yield $this->service->getNavService()->getNavigation($pid,$region);
           if($this->openCache){
               yield  $this->getComm()->getRedis()->set($modularKey, json_encode($modular), $this->cacheTime);
           }
       }
        $obj = $this->getObject(Comm::class);
        foreach($modular as $index =>$item){
            $catKey = sprintf("%u",crc32($item['cat_id']));
            $videoList = [];
            if($this->openCache){
                $key  = 'modularVideoKey_'.$catKey."_".$start."_".$limit;
                $data = yield $this->getComm()->getRedis()->get($key);
                if(!empty($data)){
                    $videoList =  json_decode($data,true);
                };
            }
           $catIdArr = explode(',',$item['cat_id']);
           if(empty($videoList)){
               $videoList =  yield  $this->service->getVideoService()->getVideoListByCategory($catIdArr,$start,$limit);
               if($this->openCache){
                   yield  $this->getComm()->getRedis()->set($key, json_encode($videoList), $this->cacheTime);
               }
           }
           $videoList =  $this->tidyUpData($videoList);
           if(empty($index) && $format == true){
               $videoList = $this->processFirstVideoList($videoList);;
           }
           if($index == 1 && $format == true){
               $videoList = $this->processSecondVideoList($videoList);;
           }
           $item['modhref']  = $obj->generateLinks('/category/?cat=',$item['cat_id']);
           $modular[$index]  = $item;
           $modular[$index]['video'] = $videoList;
        }
        return $modular;
    }

    /**
     * 处理第一个分类视频数据格式
     * @param $videoList
     * @return mixed
     */
    public function processFirstVideoList($videoList)
    {
        if(empty($videoList)){
            return $videoList;
        }
        $list['slideData'] = [$videoList[0],$videoList[1]];
        unset($videoList[0],$videoList[1]);
        $list['contentData'] = array_chunk($videoList,3);
        return  $list;
    }

    /**
     * 处理第二个视频分类数据
     * @param $videoList
     * @return array
     */
    public function processSecondVideoList($videoList)
    {
        if(empty($videoList)){
             return $videoList;
        }
       $chunkData =  array_chunk($videoList,2);
       if(count($chunkData) > 3){
           $chunkData = array_slice($chunkData,0,3);
        }
        return $chunkData;
    }


    /**
     * 获取图片地址与视频详情页地址
     * @param $data
     * @return mixed
     */
    public function tidyUpData($data)
    {
        $obj = $this->getObject(Comm::class);
        foreach($data as $key => $val){
            $video_id  = $val['id'];
            $category  = $val['category'];
            if(empty($val['images'])){
                $val['images']['fillename'] = 'you_4275_hqdefault.jpg';//如果没有图片，先临时给一张默认图片
            } 
            $val['alt'] = $val['title'];
            $mbTitle    = $val['title'];
            if(mb_strlen($mbTitle) > 40 ){
                $mbTitle = mb_substr($val['title'],0,40);
            }
            $val['alt'] = $mbTitle;
            $val['title'] = $mbTitle;
            $val['description'] = isset($val['description']) ? $val['description'] : '';
            $val['alt_description'] = $val['description'];
            $val['images_url'] = $obj->generatePictureLinks($val['images']['fillename'],true,$this->width,$this->height);
            $val['href'] = $obj->generateLinks( '/single/?watch=',$video_id);
            $val['catehref'] = $obj->generateLinks( '/category/?cat=',$category);
            $data[$key] = $val;
        }
        return $data;
    }

    /**
     * 右侧视频数据
     * @param $pid
     * @param string $region
     * @param int $start
     * @param int $limit
     * @return mixed
     */
    public function sidebarData($pid,$region='4',$start=0,$limit=9)
    {
        $data = yield $this->getModularList($pid,$region,$start,$limit,false);
        return $data;
    }

    /**
     * 根据URl参数获取视频ID
     */
    public function getVideoId($watch='')
    {
        if(empty($watch)){
            $watch  =  $this->getContext()->getInput()->get('watch');
        }
        if(empty($watch)){
             return 0;
        }
        $encObj = $this->getObject(UrlEncrypt::class);
        $video_id  = $encObj->decrypt_url($watch);
        return  intval($video_id);
    }

    /**
     * 根据视频ID获取视频信息
     * @param int $video_id
     */
    public function getVideoDataById($video_id=0)
    {
        $data = [];
        if($this->openCache){
            $key = "detail_".$video_id;
            $jsonData = yield $this->getComm()->getRedis()->get($key);
            if(!empty($jsonData)){
                $data =  json_decode($jsonData,true);
            };
        }
        if(!empty($data)){
              return $data;
        }
        $data = yield $this->service->getVideoService()->getVideoDataById($video_id);
        $data =  $this->tidyUpData($data);
        $videoData =  isset($data[0]) ? $data[0] : $data;
        if(!empty($videoData['hls_key'])){
            $videoData['videoUrl'] = $this->getComm()->generateVideoLinks($videoData['hls_key']);
            $videoData['videoplayType'] = 'hls';
        }else{
            $pathInfo = pathinfo($videoData['filename']);
            $videoData['videoUrl'] = $this->getComm()->generateVideoLinks($pathInfo['filename']);
            $videoData['videoplayType'] = 'mp4';
        }
        if($this->openCache){
            yield  $this->getComm()->getRedis()->set($key, json_encode($videoData), $this->cacheTime);
        }
        return $videoData;
    }



}

