<?php
/**
 * Base
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */ 

namespace App\Controllers;

use PG\MSF\Controllers\Controller; 
use App\Lib\Options\StaticOption;

class Base extends Controller
{

   protected $assignData = [];

   public function __construct($controllerName, $methodName)
   { 
        parent::__construct($controllerName,$methodName);  
        $this->__init();
   } 

  /**
   * [__init 所有ACTION执行之前都要先执行这个方法]
   * @return [type] [description]
   */
  public function __init()
  {
      $this->__staticInit();
  }

    /**
     * 页面发送静态资源
     *
     * @param null $action
     */
    protected function __staticInit($action = null)
    {
        $static = StaticOption::options();
        $static_url = $this->getConfig()->get('constant.STATIC_URL');
        $assign = [
            'static_url' => $static_url,
            'static'     => $static
        ];
        $this->assign($assign);
        $this->assign('staticOption',$assign);
  }

    /**
     * @param $key
     * @param null $value
     */
    protected function assign($key,$value=null)
    {
        if(is_array($key)){
              $this->assignData = array_merge($this->assignData,$key);
        }else{
            $this->assignData[$key] = $value;
        }
    }

    /**
     * @param $view
     * @param null $data
     */
    protected function display($view = null ,$data=array())
    {
        if($this->assignData){
            $data = array_merge($this->assignData,$data);
        }
        $this->outputView($data,$view);
   }



    /**
     * 销毁,解除引用
     */
    public function destroy()
    {
        $this->assignData = null;
    }

}

