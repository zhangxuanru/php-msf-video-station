<?php
/**
 * elasticsearch 搜索
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/9
 * Time: 11:00
 */

namespace App\Lib\Search;

use PG\MSF\Base\Core;

use Elasticsearch\ClientBuilder;

/**
 * Class Child
 * @package PG\MSF\Base
 */
class EsSearch extends Core
{
   private  $client = null;

    public function __construct($host=[])
    {
        parent::__construct();
        if(!empty($host)){
           $clientBuilder = $this->getObject(ClientBuilder::class)->create()->setHosts($host)->build();
           $this->client  = $clientBuilder;
        }
    }

    public function search($params=[])
    {
        if(empty( $this->client)){
            return [];
        }
       return  $this->client->search($params);
    }

    /**
     * 销毁,解除引用
     */
    public function destroy()
    {
        $this->client = null;
        parent::destroy();
    }

}
