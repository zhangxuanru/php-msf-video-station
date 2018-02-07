<?php
/**
 * 评论
 *
 *  Comment  Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;

use App\Lib\Tool\FuncS;
use App\Lib\Tool\Csrf;

class CommentLogic extends BaseLogic
{

    /**
     * 检查今天是否提交过评论
     * @param int $video_id
     */
    public function checkCurrDayIsComment($video_id)
    {
        $ip = $this->getContext()->getInput()->getRemoteAddr();
        $num = 0;
        if(!empty($ip)){
            $ipCacheKey = 'comment_'.$video_id.'_'.ip2long($ip);
            $num = yield $this->getComm()->getRedis()->get($ipCacheKey);
        }
        if(empty($num) || $num < 3 ){
             return true;
        }
       return false;
    }


    /**
     * 设置评论缓存
     * @param $video_id
     * @return \Generator
     */
    public function setCurrDayComment($video_id)
    {
        $ip = $this->getContext()->getInput()->getRemoteAddr();
        if(!empty($ip)){
            $ipCacheKey = 'comment_'.$video_id.'_'.ip2long($ip);
            $num = yield $this->getComm()->getRedis()->get($ipCacheKey);
            if(empty($num)){
                $num = 0;
            }
            $num++;
            $cacheTime =  strtotime(date('Y-m-d 23:59:59')) - time();
            yield $this->getComm()->getRedis()->set($ipCacheKey,$num,$cacheTime);
        }
    }

    /**
     * 检查提交的评论数据
     * @param array $data
     */
    public function checkPostData($data=[])
    {
        if(empty($data)){
             throw new \Exception('请求为空');
        }
       if(!isset($data['content']) || !isset($data['token']) || !isset($data['watch'])){
           throw new \Exception('数据不合法');
       }
       if(empty($data['content']) || empty($data['token']) || empty($data['watch'])){
          throw new \Exception('数据为空');
        }
       //处理提交内容
       $func = $this->getObject(FuncS::class);
       $data['content'] = $func->RemoveXSS($data['content']);
       if(empty($data['content'])){
          throw new \Exception('数据非法');
       }
      //验证CSRF
       $csrF = $this->getObject(Csrf::class);
       $ret = yield $csrF->inspectCsrFToken($data['token']);
       if($ret == false){
            throw  new \Exception("非法请求! 请稍后重试");
         }
       return $data;
   }

    /**
     * 保存评论数据
     * @param array $data
     */
    public function saveComment($data=[])
    {
        $data['addDate'] = time();
        $data['user_id'] = 0;
        $ret = yield $this->service->getCommentService()->saveComment($data);
        return $ret;
    }


}

