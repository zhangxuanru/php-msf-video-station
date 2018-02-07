<?php
/**
 * 栏目页
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

class Science extends Base
{
    public function actionIndex()
    {
       $Row['modular'] = yield $this->Logic->getVideoLogic()->getModularList($this->currentColnum,3);
       $this->assign('modular',$Row);
       $this->display();
    }

}

