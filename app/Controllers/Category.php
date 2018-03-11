<?php
/**
 * 视频分类详情页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;

class Category extends Base
{
    private  $limit = 5;

    /**
     * 视频分类详情页
     * @return bool
     */
    public function actionIndex()
    {
        $catId = yield $this->Logic->getCateLogic()->getUrlCateId();
        if(empty($catId)){
            $this->render('/');
            return true;
        }
        $cat  =  $this->getContext()->getInput()->get('cat');
        //获取总数
        $count =  yield $this->Logic->getCateLogic()->getVideoCountByCatId($catId);
        //总共页数
        $pageNumber = ceil($count/$this->limit);
        //当前页数
        $page = $this->getContext()->getInput()->get('page');
        if(empty($page)){
            $page = 1;
        }
        //开始条数
        $start = ($page-1)*$this->limit;
        $data = yield $this->Logic->getCateLogic()->getVideoDataByCateId($catId,$start,$this->limit);
        $keyWords = array_column($data,'tag');
        $keyWords = implode(',',$keyWords);
        $metaData = array(
            'title'       => $keyWords,
            'description' => $keyWords,
            'keywords'    => $keyWords
        );
        $this->assign('cat',$cat);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('pageNumber',$pageNumber);
        $this->assign('videoData',$data);
        $this->assign('metaData',$metaData);
        $this->display();
    }

}

