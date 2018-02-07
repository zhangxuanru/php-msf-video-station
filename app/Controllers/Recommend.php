<?php
/**
 * 推荐视频列表页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;

class Recommend extends Base
{
    private  $limit = 5;

    /**
     * 推荐视频列表页, 把置顶的与推荐的都列出来
     * @return bool
     */
    public function actionIndex()
    {
       //获取总数
       $count =  yield $this->Logic->getVideoLogic()->getRecommendVideoCount();
        //总共页数
       $pageNumber = ceil($count/$this->limit);
       //当前页数
       $page = $this->getContext()->getInput()->get('page');
       if(empty($page)){
           $page = 1;
       }
        //开始条数
       $start = ($page-1)*$this->limit;
       $data =  yield $this->Logic->getVideoLogic()->getRecommendVideoData($start,$this->limit,false);
       $keyWords = array_column($data,'tag');
       $keyWords = implode(',',$keyWords);
       $metaData = array(
            'title'       => $keyWords,
            'description' => $keyWords,
            'keywords'    => $keyWords
        );
       $this->assign('count',$count);
       $this->assign('page',$page);
       $this->assign('pageNumber',$pageNumber);
       $this->assign('videoData',$data);
       $this->assign('metaData',$metaData);
       $this->display();
    }

}

