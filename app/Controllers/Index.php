<?php
/**
 * 欢迎
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

class Index extends Base
{
    public function actionIndex()
    {
      //获取推荐视频
       $data = yield $this->Logic->getVideoLogic()->getRecommendVideoData(0,5);
       $Row['modular'] = yield $this->Logic->getVideoLogic()->getModularList($this->currentColnum,3);
       $this->assign('data',$data);
       $this->assign('modular',$Row);
       $this->display();
    }

}

