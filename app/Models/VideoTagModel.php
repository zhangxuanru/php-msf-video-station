<?php
/**
 * 视频标签模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoTagModel extends BaseModel
{
    public static $tableName = 'grab_video_tags';

    public static $tagTableName = 'grab_tags';

    private $field = 'id,video_id,tag_id';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

   /**
     * [getTagByVideoIdList 获取视频标签数据]
     * @param  array $videoIdList    [视频ID数组]   
     * @return [type]            [description]
     */
    public function getTagByVideoIdList($videoIdList = [])
    {
        if(empty($videoIdList)){
              return [];
        }
    	$where['is_del'] = ['symbol' => '=','value' => 0];   
        $where['video_id'] = ['symbol' => 'in','value' => $videoIdList];
    	$data = yield $this->getList($this->field,$where);
    	return $data;
    }

   /**
    * [getTagDataByIdList 根据ID获取视频标签]
    * @param  array  $idList [description]
    * @return [type]         [description]
    */
    public function getTagDataByIdList($idList = [] )
    {
        if(empty($idList)){
            return [];
        }
       $field = 'id,tag';
       $this->setTable( self::$tagTableName ); 
       $where['id'] = ['symbol' => 'in','value' => $idList];    
       $tagData = yield $this->getList($field,$where); 
       return $tagData;
    }


    /**
     * 获取标签排行榜
     * @param int $limit
     */
    public function getTagsRanking($limit = 10)
    {
      $sql = sprintf("select tag_id,count(tag_id) as cnumber from %s GROUP BY tag_id ORDER BY cnumber DESC limit 0, %d", self::$tableName,$limit);
      $data = yield  $this->executionSql($sql);
      $result  = isset($data['result']) ? $data['result']: $data;
      if(empty($result)){
            return $result;
        }
     $videoIdList = array_column($result,'tag_id');
     $tagData = yield $this->getTagDataByIdList($videoIdList);
     return $tagData;
   }


    /**
     * 根据tag_id获取视频列表数据
     * @param string $tagId
     * @param int $start
     * @param int $limit
     */
    public function getVideoDataByTagId($tagId='',$start=0,$limit=10)
    {
        $where['tag_id'] = ['symbol' => '=','value' => $tagId];
        $where['is_del'] = ['symbol' => '=','value' => '0'];
        $condition['offset'] = $start;
        $condition['limit']  = $limit;
        $tagData = yield $this->getList($this->field,$where,$condition);
        return array_column($tagData,'video_id');
    }

    /**
     * 根据tag_id获取视频总数
     * @param string $tagId
     * @return mixed
     */
    public function getVideoCountByTagId($tagId='')
    {
       $where['tag_id'] = ['symbol' => '=','value' => $tagId];
       $where['is_del'] = ['symbol' => '=','value' => '0'];
       $count =  yield $this->getCount($where);
       return $count;
    }

}


