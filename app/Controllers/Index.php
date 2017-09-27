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

class Index extends Controller
{ 
    public function actionIndex()
    {  
    	  $static = StaticOption::options();

      //  print_r($static);

        // echo STATIC_URL;
        
       $this->output( $static );  


        $assign = []; 
        $this->outputView($assign,'Index/Index');
    }

    public function actionBack()
    {
    	 // $this->output('hi zxr,国兴 hello world!');  
    }

}
