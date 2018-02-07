<?php
/**
 * 基础模型
 * Created by PhpStorm.
 * User: zxr
 * Date: 2018/1/13
 * Time: 15:21
 */
namespace App\Models;
use PG\MSF\Models\Model;

class BaseModel extends Model
{
     protected  static  $tableName = '';
    /**
     * 从库连接信息
     * @var string
     */
     public static $slave = 'slave1';

     /**
      * [$master 主库配置信息]
      * @var string
      */
     public static $master = "master";

    /**
     * @var null|\PG\AOP\Wrapper|\PG\MSF\Pools\Miner|\PG\MSF\Pools\MysqlAsynPool
     */
     protected $db = null;

     protected $condition = [];

     protected $where = [];

     public function __construct()
     {
        parent::__construct();
        $this->db = $this->getMysqlPool(self::$slave);
     }

    /**
     * 根据条件查询列表数据
     * @param $field
     * @param $where
     * @param $condition
     * @return mixed
     */
    public function getList($field='*',$where=[],$condition=[])
    {
        $this->condition = $condition;
        $this->where  = $where;
        $this->bindQuery();
        $data  =  yield $this->db->select($field)->from(self::$tableName)->go(); 
        return $data['result'];
    }

    /**
     * [save 保存数据]
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    public function save($data = array())
    {
        $poolObj = $this->getMysqlPool(self::$master);
        $result  = yield  $poolObj->insert(self::$tableName)->set($data)->go();
        if($result['result']){
            return $result['insert_id'];
        }
        return 0;
    }
 
    /**
     * [update 修改数据]
     * @param  [type] $setData [description]
     * @param  array  $where   [description]
     * @return [type]          [description]
     */
    public function update($setData,$where=array())
    {
       $this->where = $where; 
       $poolObj = $this->getMysqlPool(self::$master);
       $this->bindWhere($poolObj);
       $ret = yield $poolObj->update(self::$tableName)->set($setData)->go(); 
       return $ret; 
     }


    /**
     * 获取总数
     * @param array $where
     * @return string
     */
    public function getCount($where = array())
    {
        $this->where  = $where;
        $this->condition = [];
        $this->bindQuery();
        $data  =  yield $this->db->select('count(*) AS count')->from(self::$tableName)->go();
        $this->where = null;
        return $data['result'][0]['count'];
    }

    /**
     * 直接执行SQL
     * @param string $sql
     */
    public function executionSql($sql='')
    {
         $data = yield $this->db->go(null,$sql);
         return $data;
    }


     /**
     * 绑定执行条件
     */
     protected function bindQuery()
     {
        $this->bindCondition();
        $this->bindWhere();
     }

    /**
     * 绑定Condition条件
     * @param $condition
     */
    private function bindCondition()
    {
        $condition = $this->condition ;
        if(empty($condition)){
              return true;
        }
        if(isset($condition['limit']) && isset($condition['offset']) && $condition['limit'] > 0 ){
            $this->db->limit($condition['limit'],$condition['offset']);
        }
        if(isset($condition['group'])){
            $this->db->groupBy($condition['group']);
        }
        if(isset($condition['order']) && isset($condition['sort']) && !empty($condition['order']) ){
            $this->db->orderBy($condition['order'],$condition['sort']);
        }
        if(isset($condition['order2']) && isset($condition['sort2']) && !empty($condition['order2']) ){
            $this->db->orderBy($condition['order2'],$condition['sort2']);
        }

    }

    /**
     * 绑定Where条件
     * @param $where
     */
    private function bindWhere($dbMiner = null )
    {
        $where = $this->where;
        if(empty($where)){
            return true;
        }
        if(empty($dbMiner)){
            $dbMiner  = $this->db;
        }
        foreach($where as $key => $val){ 
             if( $val['symbol'] == 'in'){
                     $dbMiner->whereIn($key,$val['value']);
                     continue;
              }
              if( $val['symbol']== 'between'){
                      $dbMiner->whereBetween($key,$val['min'],$val['max']);
                      continue;
               } 
            $dbMiner->where($key,$val['value'],$val['symbol']);
        }
    }

    /**
     * 设置表名
     * @param $tableName
     */
    public function setTable($tableName)
    {
        self::$tableName =  $tableName;
    }



    /**
     * [destroy 垃圾回收]
     * @return [type] [description]
     */
     public function destroy()
     {
        $this->db = null;
        $this->condition = null;
        $this->where = null;
        self::$tableName = null;
        parent::destroy();
     } 
}
