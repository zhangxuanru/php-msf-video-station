<?php
/**
 * Demo模型
 */
namespace App\Models;
use PG\MSF\Models\Model;


class Demo extends Model
{ 

    public function getList()
    {
        $bizLists  = yield $this->getMysqlPool('master')->select("*")->from('youtube')->go();
        return $bizLists;
    } 


    public function destroy()
    {
        parent::destroy(); 
    }
}