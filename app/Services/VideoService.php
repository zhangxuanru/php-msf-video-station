<?php
/**
 * 视频 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services; 
use App\Lib\Tool\Comm;
use App\Models\VideoModel;
use App\Models\VideoTagModel;
use App\Models\VideoImagesModel;

use App\Lib\Tool\UrlEncrypt;

class VideoService extends BaseService
{ 
    public function __construct()
    {
        parent::__construct();
        $this->objPool = $this->getObject(VideoModel::class);
    }  

    /**
     * [getNavigation 获取置顶视频]
     * @param  integer $limit    [description] 
     * @return [type]            [description]
     */
    public function getTopVideoData($limit = 10)
    {
         $data =  yield  $this->objPool->getTopVideoData($limit);
         $data =  yield  $this->getVideoExtensionFormat($data);
         return $data;
    }

    /**
     * getRecommendVideoData 获取推荐视频
     * @param  int $start
     * @param int $limit
     * @param bool $extend
     */
    public function getRecommendVideoData($start=0,$limit = 10,$extend=false)
    {
        $data = yield $this->objPool->getRecommendVideoData($start,$limit);
        $data =  yield  $this->getVideoExtensionFormat($data,$extend);
        return $data;
    }

    /**
     * 获取推荐视频总数
     * @return mixed
     */
    public function getRecommendVideoCount()
    {
        $count = yield $this->objPool->getRecommendVideoCount();
        return $count;
    }


    /**
     * 根据分类ID查询视频数据
     * @param $categoryId
     * @param  $start
     * @param  $limit
     */
    public function getVideoListByCategory($categoryId,$start = 0, $limit = 10)
    {
        $data = yield $this->objPool->getVideoListByCategory($categoryId,$start,$limit);
        $data =  yield  $this->getVideoExtensionFormat($data,true);
        return $data;
    }

    /**
     * 根据分类ID获取视频总数
     * @param $catId
     * @return mixed
     */
    public function getVideoCountByCatId($catId)
    {
        $count = yield $this->objPool->getVideoCountByCatId($catId);
        return $count;
    }

    /**
     * 根据视频ID获取视频数据
     * @param int $video_id
     */
    public function getVideoDataById($video_id)
    {
      $data = yield $this->objPool->getVideoDataById($video_id);
      $data =  yield  $this->getVideoExtensionFormat($data,true);
      return $data;
    }


    /**
     * 获取视频扩展数据
     * @param $data
     * @param $extend
     * @return mixed
     */
    public  function getVideoExtensionFormat($data,$extend=false)
    {
        $videoIdList = array_column($data,'id');
        //取tag
        $tagService = $this->getObject(TagsService::class);
        $tagData =  yield $tagService->getRandomTagNameByVideoIdList($videoIdList);
        //取图片
        $imageService = $this->getObject(VideoImagesService::class);
        $imagesData = yield $imageService->getVideoSinglePicture($videoIdList,false);
        $commObj = $this->getObject(Comm::class);
        foreach ($data as $k => $v) {
            $video_id  = $v['id'];
            $v['images'] = [];
            if(isset($imagesData[$video_id])){
                $v['images']     = $imagesData[$video_id];
                $v['images_url'] = $commObj->generatePictureLinks($imagesData[$video_id]['fillename']);
            }
            $tagRow      =  isset($tagData[$video_id]) ? $tagData[$video_id]:[];
            $v['tag']    =  isset( $tagRow['tag'] ) ? $tagRow['tag'] : '';
            $v['tag_id'] =  isset($tagRow['tag_id']) ? $tagRow['tag_id'] : '';
            $data[$k] = $v;
        }
        if($extend){
            $data = yield $this->procExtendData($data);
        }
        return $data;
    }

    /**
     * 处理扩展表信息数据
     * @param array $data
     * @return array
     */
    public function procExtendData($data=[])
    {
        $videoIdList = array_column($data,'id');
        $extendService = $this->getObject(VideoExtendService::class);
        $extData = yield  $extendService->getVideoExtendData($videoIdList);
        foreach ($data as $k => $v) {
              $video_id = $v['id'];
              $item = isset($extData[$video_id]) ?  $extData[$video_id] : [];
              $data[$k] = array_merge($v,$item);
        }
        return $data;
    }

}
