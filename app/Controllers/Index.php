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
         $this->display();
    }

    public function actionBack()
    {
       $this->output('hi zxr,国兴 hello world!');
    }


    /**
     * 销毁,解除引用
     */
    public function destroy()
    {

    }

}

