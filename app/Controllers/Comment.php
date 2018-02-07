<?php
/**
 * 评论
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;
use App\Lib\Tool\Csrf;

class Comment extends Base
{
    /**
     * 提交评论
     */
    public function actionSubComment()
    {
        try{
            $data = $this->getContext()->getInput()->getAllPost();
            $data = yield $this->Logic->getCommentLogic()->checkPostData($data);
            $video_id = yield $this->Logic->getVideoLogic()->getVideoId($data['watch']);
            $isComment = yield $this->Logic->getCommentLogic()->checkCurrDayIsComment($video_id);
            if($isComment == false){
                throw new \Exception("今日你已评论过,请明日再来评论！");
            }
            if(empty($video_id)){
               throw new \Exception("请求数据错误");
           }
          unset($data['token'],$data['watch']);
          $data['video_id'] = $video_id;
          $ret =  yield  $this->Logic->getCommentLogic()->saveComment($data);
          if($ret){
             $csrF = $this->getObject(Csrf::class);
             yield $csrF->delAllCsrF();
             yield $this->Logic->getCommentLogic()->setCurrDayComment($video_id);
             $msg = ['code' => '1','msg' => '发表评论成功!!!'];
             $this->outputJson($msg);
          }else{
             $error = ['code' => '-1','msg' => '发表评论失败!!!'];
             $this->outputJson($error);
          }
       }catch(\Exception $e){
           $error = ['code' => '-1','msg' => $e->getMessage()];
           $this->outputJson($error);
         }
    }

}

