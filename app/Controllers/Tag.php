<?php
/**
 * 视频标签详情页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;

class Tag extends Base
{
    private  $limit = 5;
    /**
     * 视频标签详情页
     * @return bool
     */
    public function actionIndex()
    {
        $tagId = yield $this->Logic->getTagsLogic()->getUrlTagId();
        if(empty($tagId)){
            $this->render('/');
            return true;
        }
        $tag  =  $this->getContext()->getInput()->get('tag');
       //获取总数
       $count =  yield $this->Logic->getTagsLogic()->getVideoCountByTagId($tagId);
        //总共页数
       $pageNumber = ceil($count/$this->limit);
       //当前页数
       $page = $this->getContext()->getInput()->get('page');
       if(empty($page)){
           $page = 1;
       }
        //开始条数
       $start = ($page-1)*$this->limit;
       $data =  yield $this->Logic->getTagsLogic()->getVideoDataByTagId($tagId,$start,$this->limit);
       $keyWords = array_column($data,'tag');
       $keyWords = implode(',',$keyWords);
       $metaData = array(
            'title'       => $keyWords,
            'description' => $keyWords,
            'keywords'    => $keyWords
        );
       $this->assign('tag',$tag);
       $this->assign('count',$count);
       $this->assign('page',$page);
       $this->assign('pageNumber',$pageNumber);
       $this->assign('videoData',$data);
       $this->assign('metaData',$metaData);
       $this->display();
    }

}

