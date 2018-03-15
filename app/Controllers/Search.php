<?php
/**
 * 视频搜索页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use App\Lib\Tool\FuncS;


class Search extends Base
{
    private  $limit = 5;

    /**
     * 视频搜索页
     * @return bool
     */
    public function actionIndex()
    {
        $keywords = $this->getContext()->getInput()->get('keywords');
        $type     = $this->getContext()->getInput()->get('type');
        if(strlen($keywords) > 100 ){
            $keywords = substr($keywords,0,100);
        }
         //当前页数
        $page = $this->getContext()->getInput()->get('page');
        if(empty($page)){
            $page = 1;
        }
        //开始条数
        $start = ($page-1)*$this->limit;
        $data = yield $this->Logic->getSearchLogic()->getSearchByKeyWords($keywords,$start,$this->limit);
        //重新拆词
        $terms = [];
        if(empty($data)){
            $terms =  $this->Logic->getSearchLogic()->getProcessKeyWordsSearch($keywords);
        }else{
            $data = yield $this->Logic->getSearchLogic()->getVideoDataBySearchData($data);
        }
        $metaData = array(
            'title' => $keywords
        );
        //总数
        $total = isset($data['total']) ? $data['total'] : 0 ;
        //总共页数
        $pageNumber = ceil($total/$this->limit);
        $keyArr = $this->Logic->getSearchLogic()->processKeyWord($keywords);
        $this->assign('keyArr',$keyArr);
        $this->assign('terms',['terms'=>$terms]);
        $this->assign('count',$total);
        $this->assign('page',$page);
        $this->assign('pageNumber',$pageNumber);
        $this->assign('keywords',$keywords);
        $this->assign('type',$type);
        $this->assign('videoData',$data);
        $this->assign('metaData',$metaData);
        $this->display();
    }

    /**
     * 自动匹配接口
     */
    public function actionQuery()
    {
        $keyword = $this->getContext()->getInput()->get('keyword');
        $keyword = trim($keyword);
        if(empty($keyword) ){
             $this->outputJson([]);
             return;
        }
        $data = yield $this->Logic->getSearchLogic()->getSuggestSearchByKeyWords($keyword,0,20);
        $this->outputJson($data); 
    }


}

