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
use App\Lib\Service\Services;
use App\Controllers\Helper\Logic;
use App\Lib\Tool\Comm;
use App\Lib\Tool\UrlEncrypt;


class Base extends Controller
{
   protected $assignData = [];

   protected  $controllerName = '';

   protected  $methodName = '';

   protected  $service = null;

   protected  $Logic = null;

   protected  $static_version = '';

   protected  $currentColnum = '1';

   protected  $assignMethodDisable = array(
       'Index_actionBa'
   );

   public function __construct($controllerName, $methodName)
   { 
        parent::__construct($controllerName,$methodName);
        $this->controllerName = $controllerName;
        $this->methodName = $methodName;
        yield $this->__init();
   } 

  /**
   * [__init 所有ACTION执行之前都要先执行这个方法]
   * @return [type] [description]
   */
  public function __init()
  {
      $this->__staticInit();
      $this->__serviceInit();
      $this->__getColNum();
      $currAction = $this->controllerName.'_'.$this->methodName;
      if(!in_array($currAction,$this->assignMethodDisable)){
           yield $this->__assignDefaultData();
      }
  }

    /**
     * 页面发送静态资源
     *
     * @param null $action
     */
    protected function __staticInit($action = null)
    {
        if(empty($action)){
            $method_prefix =  $this->getConfig()->get('http.method_prefix','action');
            $method = str_replace($method_prefix,'',$this->methodName);
            $action = strtolower($this->controllerName.'.'.$method);
        }
        $static = StaticOption::options($action);
        $commObj = $this->getObject(Comm::class);
        $config = $commObj->getConfigData();
        $assign = [
            'static_url'     => $config['static_url'],
            'static_version' => $config['static_version'],
            'static'         => $static
        ];
        $this->static_version = $config['static_version'];
        $this->assign($assign);
        $this->assign('staticOption',$assign);
  }

    /**
     * 服务信息初始化
     */
    private function __serviceInit()
    {
        $this->service  = $this->getObject(Services::class);
        $this->Logic    = $this->getObject(Logic::class);
    }

    /**
     * 获取栏目初始化
     */
    private function __getColNum()
    {
        $currentCol = $this->getContext()->getInput()->get('c');
        if(!empty($currentCol)){
            $encObj = $this->getObject(UrlEncrypt::class);
            $cid =  $encObj->decrypt_url($currentCol);
            $this->currentColnum = $cid;
        }else{
//            $cid = $this->getContext()->getInput()->getCookie('cid');
//            if($cid){
//                $this->currentColnum = $cid;
//            }
        }
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
   * [assignDefauleData 发送默认数据]
   * @return [type] [description]
   */
   public function __assignDefaultData()
   {
       //导航
       $defaultData['navData'] = yield $this->Logic->getNavLogic()->getNavigation(0,1);
       //置顶视频
       $defaultData['videoList'] = yield $this->Logic->getVideoLogic()->getTopVideoData(10);
       //右侧标签
       $defaultData['getTagsRanking'] = yield $this->Logic->getTagsLogic()->getTagsRanking();

       //右侧栏目
       $sidebarData = yield $this->Logic->getVideoLogic()->sidebarData($this->currentColnum);
       if(empty($sidebarData) && $this->currentColnum != '1'){
           $currentColnum = '1';
           $sidebarData = yield $this->Logic->getVideoLogic()->sidebarData($currentColnum);
       }
       $defaultData['sidebarData']    =  $sidebarData;
       $defaultData['static_version'] = $this->static_version;
       $this->assign('defaultData',$defaultData);
   }

    /**
     * [render 跳转]
     * @return [type] [description]
     */
    public function render($url)
    {
        $this->output("<script>window.location.href='".$url."'</script>" );
        return true;
    }

    /**
     * 销毁,解除引用
     */
    public function destroy()
    { 
        $this->assignData = [];
        parent::destroy();
    }

}

