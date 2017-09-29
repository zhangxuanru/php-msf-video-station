<?php
/**
 * 欢迎
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use PG\MSF\Controllers\Controller;

use App\Base\StaticOption;
use App\Controllers\Base;

class Index extends Base
{    
    public function actionIndex()
    {  
         $static = StaticOption::options();   
         $static_url = $this->getConfig()->get('constant.STATIC_URL');   
         $assign = [
              'static_url' => $static_url,
              'static'     => $static
           ];  
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

