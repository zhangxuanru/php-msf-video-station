<?php
/**
 * 视频评论 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;

use App\Models\VideoCommentModel;

use  App\Models\VideoStatisticalModel;

class CommentService extends BaseService
{ 
    public function __construct()
    {
        parent::__construct();
        $this->objPool = $this->getObject(VideoCommentModel::class);
    }

    /**
     * 保存数据
     * @param array $data
     */
    public function saveComment($data=[])
    {
        $ret = yield $this->objPool->saveComment($data);
        //更新统计表
        $statistical = $this->getObject(VideoStatisticalModel::class);
        yield $statistical->updateStatisticsReviews($data['video_id']);
        return $ret;
    }

}
