<?php
/**
 * 视频统计模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoStatisticalModel extends BaseModel
{
    public static $tableName = 'grab_video_statistical';

    private $field = 'id,video_id,view_count,like_number,reviews_number';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

    /**
     * 更新统计表评论数据，更实信息
     * @param $video_id
     * @param int $num
     */
    public function updateStatisticsReviews($video_id,$num=1)
    {
        $data['video_id'] = $video_id;
        $where['video_id'] = ['symbol' => '=','value' => $video_id];
        $list = yield $this->getList('id,reviews_number',$where);
        if(empty($list)){
            $data['reviews_number'] = $num;
            $ret =  yield $this->save($data);
        }else{
            $id = $list[0]['id'];
            $where['id'] = ['symbol' => '=','value' => $id];
            $data['reviews_number'] = $list[0]['reviews_number'] + $num;
            $ret =  yield $this->update($data,$where);
        }
        return $ret;
    }

}


