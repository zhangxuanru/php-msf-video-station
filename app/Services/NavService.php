<?php
/**
 * 导航 逻辑层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;
use App\Models\NavModel;

class NavService extends BaseService
{ 
    public function __construct()
    {
        parent::__construct();
        $this->objPool = $this->getObject(NavModel::class);
    }  

    /**
     * [getNavigation 获取导航数据]
     * @param  integer $pid    [description]
     * @param  string  $region [description]
     * @param  int     $limit
     * @return [type]          [description]
     */
    public function getNavigation($pid=0,$region='-1',$limit=10)
    {
       $data = yield  $this->objPool->getNavigation($pid,$region,$limit);
        return $data;
    } 


    public function  destroy()
    {
        $this->objPool = null;
        parent::destroy();
    }


}
