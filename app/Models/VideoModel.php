<?php
/**
 * 视频模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoModel extends BaseModel
{
    public static $tableName = 'grab_video_info';

    private $field = 'id,info_id,title,category,qiniu_upload,is_top,is_recommend,is_reviews,type';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

   /**
     * [getTopVideoData 获取置顶视频数据]
     * @param  integer $limit    [获取的条数]   
     * @return [type]            [description]
     */
    public function getTopVideoData($limit = 10)
    {
    	$where['status'] = ['symbol' => '=','value' => 1]; 
        $where['is_top'] = ['symbol' => '=','value' => 1];     	 
    	$condition['order']  = 'sort';
    	$condition['sort']   = 'DESC';
        $condition['order2']  = 'addDate';
        $condition['sort2']   = 'DESC';
        $condition['limit']  = $limit;
        $condition['offset'] = 0;
    	$data = yield $this->getList($this->field,$where,$condition); 
    	return $data; 
    }

    /**
     * 获取推荐视频数据
     * @param  $start
     * @param int $limit
     * @return mixed
     */
    public function getRecommendVideoData($start=0,$limit = 10 )
    {
        $where['status'] = ['symbol' => '=','value' => 1];
        $where['is_recommend'] = ['symbol' => '=','value' => 1];
        $condition['order']  = 'sort';
        $condition['sort']   = 'DESC';
        $condition['order2']  = 'addDate';
        $condition['sort2']   = 'DESC';
        $condition['limit']  = $limit;
        $condition['offset'] = $start;
        $field = $this->field.',keywords,description';
        $data = yield $this->getList($field,$where,$condition);
        return $data;
    }

    /**
     * 获取推荐视频总数
     * @return mixed
     */
    public function getRecommendVideoCount()
    {
        $where['status'] = ['symbol' => '=','value' => 1];
        $where['is_recommend'] = ['symbol' => '=','value' => 1];
        $count =  yield $this->getCount($where);
        return $count;
    }


    /**
     * 根据分类ID查询视频数据
     * @param $categoryId
     */
    public function getVideoListByCategory($categoryId,$start = 0, $limit = 10)
    {
        $where['status'] = ['symbol' => '=','value' => 1];
        if(is_array($categoryId)){
            $where['category'] = ['symbol' => 'in','value' => $categoryId];
        }else{
             $where['category'] = ['symbol' => '=','value' => $categoryId];
        }
        $condition['order']  = 'sort';
        $condition['sort']   = 'DESC';
        $condition['order2']  = 'addDate';
        $condition['sort2']   = 'DESC';
        $condition['limit']  = $limit;
        $condition['offset'] = $start;
        $field = $this->field.',keywords,description';
        $data = yield $this->getList($field,$where,$condition);
        return $data;
    }


    /**
     * 根据分类ID获取视频总数
     * @param $catId
     * @return mixed
     */
    public function getVideoCountByCatId($catId)
    {
        if(is_array($catId)){
            $where['category'] = ['symbol' => 'in','value' => $catId];
        }else{
            $where['category'] = ['symbol' => '=','value' => $catId];
        }
        $where['status'] = ['symbol' => '=','value' => '1'];
        $count =  yield $this->getCount($where);
        return $count;
    }


    /**
     * 根据视频ID获取视频信息
     * @param int $video_id
     */
    public function getVideoDataById($video_id)
    {
        if(is_array($video_id)){
             $where['id'] = ['symbol' => 'in','value' => $video_id];
        }else{
             $where['id'] = ['symbol' => '=','value' => $video_id];
        }
        $where['status'] = ['symbol' => '=','value' => 1];
        $field = $this->field.',keywords,description';
        $data = yield $this->getList($field,$where);
        return $data;
    }






}


