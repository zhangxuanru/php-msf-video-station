<?php
/**
 * MySQL示例控制器
 *
 * app/data/demo.sql可以导入到mysql再运行示例方法
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use PG\MSF\Controllers\Controller;

use App\Models\Demo as DemoModel;  //Model

class MySQL extends Controller
{
    
    // MySQL连接池示例
    public function actionBizLists()
    {  
       $demoModel = $this->getObject(DemoModel::class);
       $list      =  yield $demoModel->getList();
       $this->outputJson($list);
 
        // SQL DBBuilder更多参考 https://github.com/jstayton/Miner
       //  $bizLists  = yield $this->getMysqlPool('master')->select("*")->from('youtube')->go();
       // $this->outputJson($bizLists);
      
    }

    // 直接执行sql
    public function actionShowDB()
    {
        /**
         * @var \PG\MSF\Pools\Miner $DBBuilder
         */
        $dbs = yield $this->getMysqlPool('master')->go(null, 'show databases');
        $this->outputJson($dbs);
    }

    // 事务示例
    public function actionTransaction()
    {
        /**
         * @var \PG\MSF\Pools\Miner|\PG\MSF\Pools\MysqlAsynPool $mysqlPool
         */
        $mysqlPool = $this->getMysqlPool('master');
        // 开启一个事务，并返回事务ID
        $id = yield $mysqlPool->goBegin();
        $up = yield $mysqlPool->update('user')->set('name', '徐典阳-1')->where('id', 3)->go($id);
        $ex = yield $mysqlPool->select('*')->from('user')->where('id', 3)->go($id);
        if ($ex['result']) {
            yield $mysqlPool->goBegin($id);
            $this->outputJson('commit');
        } else {
            yield $mysqlPool->goBegin($id);
            $this->outputJson('rollback');
        }
    }
}