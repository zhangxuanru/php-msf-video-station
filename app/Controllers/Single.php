<?php
/**
 * 视频详情页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;
use App\Lib\Tool\Csrf;

class Single extends Base
{
    /**
     * 视频详情页
     * @return bool
     */
    public function actionIndex()
    {
        $watch  =  $this->getContext()->getInput()->get('watch');
        $video_id = yield $this->Logic->getVideoLogic()->getVideoId();
        if(empty($video_id)){
           $this->render('/');
            return true;
        }
        $videoData = yield $this->Logic->getVideoLogic()->getVideoDataById($video_id);
        $recommendVideo = yield $this->Logic->getVideoLogic()->getRecommendVideoData(0,4,false);
        $metaData = array(
            'title'       => $videoData['title'],
            'description' => $videoData['description'],
            'keywords'    => $videoData['keywords']
        );
        $csrF = $this->getObject(Csrf::class);
        $csrfToken =  yield $csrF->generatingCSRFToken();
        $this->assign('csrfToken',$csrfToken);
        $this->assign('watch',$watch);
        $this->assign('video_id',$video_id);
        $this->assign('recommendVideo',$recommendVideo);
        $this->assign('metaData',$metaData);
        $this->assign('data',$videoData);
        $this->display();
    }


}

