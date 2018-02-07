<?php
/**
 * Redis 相关类
 *
 * Created by PhpStorm.
 * User: zxr  strive@965432@gmail.com
 * Date: 2017/11/6
 * Time: 14:28
 */
namespace App\Lib\Tool;

use PG\MSF\Base\Core;

/**
 * Class Child
 * @package PG\MSF\Base
 */
class Redis extends Core
{
    public function getRedisInstance()
    {
        return  $this->getRedisPool('p1');
    }

    /**
     * 销毁,解除引用
     */
    public function destroy()
    {
        parent::destroy();
    }

}
