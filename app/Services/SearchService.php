<?php
/**
 * 视频搜索 接口层
 * Created by PhpStorm.
 * User: zxr
 * Date: 2017/12/22
 * Time: 14:21
 */
namespace App\Services;
use App\Lib\Search\EsSearch;

class SearchService extends BaseService
{
    private $searchObj = null;

    /**
     * 索引名
     * @var string
     */
    private $index = "grab";

    /** 类型
     * @var string
     */
    private $type = "video_info";

    public function __construct()
    {
        parent::__construct();
        $host = $this->getConfig()->get("constant.ES_SEARCH_HOST");
        $port = $this->getConfig()->get("constant.ES_SEARCH_PORT");
        $this->searchObj = $this->getObject(EsSearch::class,[[$host,$port]]);
    }

    /**
     * 根据关键字执行 多字段模糊查询
     * @param string $keywords
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $order
     */
    public function searchMultiMatchByKeyWords($keywords='',$start=0,$limit=10,$sort='',$order='')
    {
        $params = array(
            'index' => $this->index,
            'type' => $this->type,
            'body' => array(
                "_source" => ["id"], //目前暂时只返回ID字段
                'query' => array(
                    'multi_match' => array(
                        'query' => $keywords,
                        'fields' => ['title','keywords']
                    )
                ),
                'from' => $start,
                'size' => $limit
            )
        );
       if(!empty($sort)){
           $params['body']['sort'] = [$sort =>['order' => $order]];
       }
      $data =  yield $this->searchObj->search($params);
      return $data;
    }


    /**
     * 根据关键字查询 自动匹配的条件
     * @param $keywords
     * @param int $start
     * @param int $limit
     */
    public function getSuggestSearchByKeyWords($keywords,$start=0,$limit=10)
    {
        $params = array(
            'index' => $this->index,
            'type' => $this->type,
            'body' => array(
                "_source" => ["title"], //目前暂时只返回ID字段
                'suggest' => array(
                    'search-key-suggest' => array(
                        'text' => $keywords,
                        'completion' => [
                               'field' => 'key_suggest'
                        ],
                    ),
                    'search-tit-suggest' => array(
                        'text' => $keywords,
                        'completion' => [
                            'field' => 'tit_suggest'
                        ],
                    )
                ),
                'from' => $start,
                'size' => $limit
            )
        );
        $data =  yield $this->searchObj->search($params);
        return $data;
    }

    
    /**
     * 根据关键字执行 多字段精确查询
     * @param string $keywords
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $order
     */
    public function searchPhraseMatchByKeyWords($keywords='',$start=0,$limit=10,$sort='',$order='')
    {
        $params = array(
            'index' => $this->index,
            'type' => $this->type,
            'body' => array(
                "_source" => ["id"], //目前暂时只返回ID字段
                'query' => array(
                    'match_phrase' => array(
                        'title' => $keywords                        
                    )
                ),
                'from' => $start,
                'size' => $limit
            )
        );
       if(!empty($sort)){
           $params['body']['sort'] = [$sort =>['order' => $order]];
       }
      $data =  yield $this->searchObj->search($params);
      return $data;
    }



    /**
     * 设置索引名
     * @param $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * 设置类型名
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}
