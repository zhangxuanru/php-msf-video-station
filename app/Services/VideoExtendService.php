<?php
/**
 * 视频扩展信息 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;
use App\Models\VideoExtendModel;

class VideoExtendService extends BaseService
{ 
    public function __construct()
    {
        parent::__construct();
        $this->objPool = $this->getObject(VideoExtendModel::class);
    }

    /**
     * 根据视频ID获取视频扩展信息
     * @param $videoIdList
     * @return \Generator
     */
    public function getVideoExtendData($videoIdList)
    {
         $list =  yield $this->objPool->getVideoExtendData($videoIdList);
         $data = [];
         foreach($list as $key => $item) {
             $video_id = $item['video_id'];
             $data[$video_id]  = $item;
         }
        return $data;
    }

}

