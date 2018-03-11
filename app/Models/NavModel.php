<?php
/**
 * 导航模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class NavModel extends BaseModel
{
    public static $tableName = 'grab_nav';
    private $field = 'id,nav_name,url,region,pid,cat_id';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

   
   /**
     * [getNavigation 获取导航数据]
     * @param  integer $pid    [description]
     * @param  string  $region [description]
     * @param   int    $limit 
     * @return [type]          [description]
     */
    public function getNavigation($pid=0,$region=-1,$limit = 10)
    {
    	$where['pid'] = ['symbol' => '=','value' => $pid]; 
    	$where['is_del'] = ['symbol' => '=','value' => 0]; 
    	if($region > -1 ){
            $where['region'] =['symbol' => '=','value' => $region]; 
    	} 
    	$condition['order'] = 'sort';
    	$condition['sort']  = 'DESC';
        $condition['order2']  = 'addDate';
        $condition['sort2']   = 'DESC';
        $condition['limit']  = $limit;
        $condition['offset'] = 0;
    	$data = yield $this->getList($this->field,$where,$condition);
    	return $data; 
    }



}


