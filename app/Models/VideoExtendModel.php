<?php
/**
 * 视频扩展信息模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoExtendModel extends BaseModel
{
    public static $tableName = 'grab_video_extend';

    private $field = 'video_id,view_count,published_at,like_number,reviews_number,author,hls_key,filename';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

   /**
     * [getVideoExtendData 获取视频扩展信息数据]
     * @param  array $videoIdList    [视频ID列表]
     * @return [type]            [description]
     */
    public function getVideoExtendData($videoIdList)
    {
        if(empty($videoIdList)){
              return [];
        }
    	$where['video_id'] = ['symbol' => 'in','value' => $videoIdList];
    	$data = yield $this->getList($this->field,$where);
    	return $data; 
    }

}


