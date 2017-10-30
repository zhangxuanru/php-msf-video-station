<?php
/**
 * Base
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */ 

namespace App\Controllers;

use PG\MSF\Controllers\Controller; 
use App\Base\StaticOption;

class Base extends Controller
{  
   
   public $staticOption = [];

   public function __construct($controllerName, $methodName)
   { 
        parent::__construct($controllerName,$methodName);  
        $this->__init(); 
        return true;
   } 

  /**
   * [__init 所有ACTION执行之前都要先执行这个方法]
   * @return [type] [description]
   */
  public function __init()
  {
         $static = StaticOption::options();   
         $static_url = $this->getConfig()->get('constant.STATIC_URL');   
         $assign = [
              'static_url' => $static_url,
              'static'     => $static
           ];  
         $this->staticOption = $assign;
    } 
    

    /**
     * 销毁,解除引用
     */
    public function destroy()
    {

    }

}

