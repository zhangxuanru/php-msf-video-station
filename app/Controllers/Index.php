<?php
/**
 * 欢迎
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use PG\MSF\Controllers\Controller;


use App\Controllers\Base;

class Index extends Base
{    
    
    public function actionIndex()
    {   
         $assign = $this->staticOption;
         $this->outputView($assign); 
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

