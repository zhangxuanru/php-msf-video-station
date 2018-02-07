<?php
/**
 * CSRF相关类
 *
 * Created by PhpStorm.
 * User: zxr  strive@965432@gmail.com
 * Date: 2017/11/6
 * Time: 14:28
 */
namespace App\Lib\Tool;

use PG\MSF\Base\Core;
use PG\MSF\Session\Session;

/**
 * Class Child
 * @package PG\MSF\Base
 */
class Csrf extends Core
{
    private $key = 'php';

    private $csrFKey = 'msf-csrf';

    private $csrFTimeKey = 'msf-csrf-time';

    private $maxTime =  60;

    /**
     * 获取session对象
     * @return mixed|\stdClass
     */
    public function getSessionPool()
    {
        $session = $this->getObject(Session::class);
        return $session;
    }


    /**
     * 生成csrf token 值
     */
    public function generatingCSRFToken()
    {
        $pi = range('a','z');
        $i  = mt_rand(0,25);
        $val = $pi[$i].microtime(true).$this->key;
        $csrFToken = md5($val);
        yield $this->getSessionPool()->set($this->csrFKey, $csrFToken);
        yield $this->getSessionPool()->set($this->csrFTimeKey,time());
        return $csrFToken;
    }

    /**
     * 获取csrf key
     * @return mixed
     */
    public function getCsrFToken()
    {
        $csrFToken = yield $this->getSessionPool()->get($this->csrFKey);
        return $csrFToken;
    }

    /**
     * 删除CSRF TOKEN 值
     * @param string $key
     * @return \Generator
     */
    public function delCsrFToken($key = '' )
    {
        if(empty($key)){
            $key = $this->csrFKey;
        }
        yield $this->getSessionPool()->delete($key);
    }

    /**
     * 删除所有CSRF数据
     * @return \Generator
     */
    public function delAllCsrF()
    {
        yield $this->delCsrFToken($this->csrFKey);
        yield $this->delCsrFToken($this->csrFTimeKey);
    }


    /**
     * 检查值是否相等
     * @param $token
     * @return bool
     */
    public function inspectCsrFToken($token)
    {
        if(empty($token)){
            return false;
        }
        $csrFTime = yield $this->getSessionPool()->get($this->csrFTimeKey);
        if(time() > $csrFTime+$this->maxTime){
               yield $this->delCsrFToken();
               yield $this->delCsrFToken($this->csrFTimeKey);
               return false;
        }
        $csrFToken = yield $this->getCsrFToken();
        if(empty($csrFToken) || $csrFToken != $token){
            return false;
        }
        return true;
    }

    /**
     * 销毁,解除引用
     */
    public function destroy()
    {
         $this->key = null;
         parent::destroy();
    }


}
