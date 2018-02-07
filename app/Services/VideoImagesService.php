<?php
/**
 * 视频图片 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;
use App\Models\VideoImagesModel;

class VideoImagesService extends BaseService
{ 
    public function __construct()
    {
        parent::__construct();
        $this->objPool = $this->getObject(VideoImagesModel::class);
    }

    /**
     * 根据视频ID获取视频图片
     * @param $videoIdList
     * @param bool $is_cover
     * @return \Generator
     */
    public function getVideoImagesData($videoIdList,$is_cover=true)
    {
         $imgData =  yield $this->objPool->getVideoImagesData($videoIdList,$is_cover);
         $data = [];
         foreach ($imgData as $key => $item) {
             $video_id = $item['video_id'];
             if($is_cover){
                $data[$video_id]  = $item;
             }else{
                 $data[$video_id][] = $item;
             }
         }
        if($is_cover == false){
             foreach($data as $index => $item){
                 $width = [];
                 foreach($item as $key => $val){
                     $width[] = $val['width'];
                 }
                 array_multisort($width,SORT_DESC,$item);
                 $data[$index] = $item;
             }
        }
        return $data;
    }

    /**
     * 根据视频ID获取单张视频图片，默认返回宽度最大的那张图片信息
     * @param $videoIdList
     * @param bool $is_cover
     */
    public function getVideoSinglePicture($videoIdList,$is_cover=true)
    {
       $imagesData = yield $this->getVideoImagesData($videoIdList,$is_cover);
       if($is_cover){
           return $imagesData;
        }else{
         foreach($imagesData as $index => $item){
             $data = $item;
             unset($imagesData[$index]);
             $imagesData[$index] = $data[0];
           }
        }
      return $imagesData;
    }

}

