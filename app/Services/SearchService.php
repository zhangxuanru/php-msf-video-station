<?php
/**
 * 视频搜索 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;
use App\Lib\Search\EsSearch;

class SearchService extends BaseService
{
    private $searchObj = null;

    /**
     * 索引名
     * @var string
     */
    private $index = "grab";

    /** 类型
     * @var string
     */
    private $type = "video_info";

    public function __construct()
    {
        parent::__construct();
        $host = $this->getConfig()->get("constant.ES_SEARCH_HOST");
        $port = $this->getConfig()->get("constant.ES_SEARCH_PORT");
        $this->searchObj = $this->getObject(EsSearch::class,[[$host,$port]]);
    }

    /**
     * 根据关键字执行 多字段模糊查询
     * @param string $keywords
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $order
     */
    public function searchMultiMatchByKeyWords($keywords='',$start=0,$limit=10,$sort='',$order='')
    {
        $params = array(
            'index' => $this->index,
            'type' => $this->type,
            'body' => array(
                "_source" => ["id"], //目前暂时只返回ID字段
                'query' => array(
                    'multi_match' => array(
                        'query' => $keywords,
                        'fields' => ['title','keywords']
                    )
                ),
                'from' => $start,
                'size' => $limit
            )
        );
       if(!empty($sort)){
           $params['body']['sort'] = [$sort =>['order' => $order]];
       }
      $data =  yield $this->searchObj->search($params);
      return $data;
    }


    
    /**
     * 根据关键字执行 多字段精确查询
     * @param string $keywords
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $order
     */
    public function searchPhraseMatchByKeyWords($keywords='',$start=0,$limit=10,$sort='',$order='')
    {
        $params = array(
            'index' => $this->index,
            'type' => $this->type,
            'body' => array(
                "_source" => ["id"], //目前暂时只返回ID字段
                'query' => array(
                    'match_phrase' => array(
                        'title' => $keywords                        
                    )
                ),
                'from' => $start,
                'size' => $limit
            )
        );
       if(!empty($sort)){
           $params['body']['sort'] = [$sort =>['order' => $order]];
       }
      $data =  yield $this->searchObj->search($params);
      return $data;
    }



    /**
     * 设置索引名
     * @param $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * 设置类型名
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }





//
//
//
//
//
//
//    /**
//     * [getTagByVideoIdList 批量获取视频标签]
//     * @param  array  $videoIdList [description]
//     * @return [type]              [description]
//     */
//    public function getTagByVideoIdList($videoIdList = [])
//    {
//         $data = yield $this->objPool->getTagByVideoIdList($videoIdList);
//         $tagData = [];
//         if(!empty($data)){
//            $idList = array_column($data,'tag_id');
//            $tagData = yield $this->objPool->getTagDataByIdList( $idList);
//        }
//        $list = [];
//        foreach ($tagData as $k => $v) {
//            foreach ($data as $key => $value) {
//                $video_id = $value['video_id'];
//                if($v['id'] == $value['tag_id']){
//                    $list[$video_id][] = $v;
//                    unset($tagData[$k]);
//                }
//            }
//        }
//        return $list;
//    }
//
//    /**
//     * [getRandomTagNameByVideoIdList 随机获取视频的一个标签]
//     * @param  array  $videoIdList [description]
//     * @return [type]              [description]
//     */
//    public function getRandomTagNameByVideoIdList($videoIdList = [])
//    {
//        $tagData = yield $this->getTagByVideoIdList($videoIdList);
//        $data = [];
//        foreach ($tagData as $key => $value) {
//            $count = count($value);
//            $index = mt_rand(0,$count-1);
//            $data[$key]['tag'] = $value[$index]['tag'];
//            $data[$key]['tag_id'] = $value[$index]['id'];
//        }
//        return $data;
//    }
//
//    /**
//     * 根据ID获取标签信息
//     * @param array $idList
//     */
//    public function getTagDataByIdList($idList=[])
//    {
//        $tagData = yield $this->objPool->getTagDataByIdList( $idList);
//        return $tagData;
//    }
//
//    /**
//     * @param int $limit
//     * 获取视频标签排行
//     */
//    public function getTagsRanking($limit = 10 )
//    {
//        $data = yield $this->objPool->getTagsRanking($limit);
//         return $data;
//    }
//
//
//    /**
//     * 根据tag_id获取视频列表数据
//     * @param string $tagId
//     * @param int $start
//     * @param int $limit
//     */
//    public function getVideoDataByTagId($tagId='',$start=0,$limit=10)
//    {
//        $videoIds = yield $this->objPool->getVideoDataByTagId($tagId,$start,$limit);
//        if(empty($videoIds)){
//               return [];
//        }
//       $videoService = $this->getObject(VideoService::class);
//       $videoData = yield $videoService->getVideoDataById($videoIds);
//       return $videoData;
//    }
//
//    /**
//     * 根据tag_id获取视频总数
//     * @param $tagId
//     */
//    public function getVideoCountByTagId($tagId)
//    {
//        $count = yield $this->objPool->getVideoCountByTagId($tagId);
//        return $count;
//    }

}
