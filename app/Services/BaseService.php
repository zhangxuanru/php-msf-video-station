<?php
/**
 * 基础服务模型
 * Created by PhpStorm.
 * User: zxr
 * Date: 2019/1/13
 * Time: 15:21
 */
namespace App\Services;
use PG\MSF\Base\Core; 

class BaseService extends Core
{
    public $objPool = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function  destroy()
    {
        $this->objPool = null;
        parent::destroy();
    }


}
