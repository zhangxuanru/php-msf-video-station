<?php
/**
 * 视频评论模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoCommentModel extends BaseModel
{
    public static $tableName = 'grab_video_comment';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

    /**
     * 保存评论数据
     * @param array $data
     */
   public function saveComment($data=[])
   {
       return yield $this->save($data);
   }


}


