<?php
/**
 *  Nav Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;


class NavLogic extends BaseLogic
{

    private $cacheTime = 600;

    /**
     * [getNavigation 获取导航数据]
     * @param  integer $pid    [description]
     * @param  string  $region [description]
     * @return [type]          [description]
     */
    public function getNavigation($pid=0,$region='-1')
    {
        if($this->openCache){
            $cacheKey = 'navigation_'.$pid.'_'.$region;
            $data =  yield $this->getComm()->getRedis()->get($cacheKey);
            if(!empty($data)){
                return json_decode($data,true);
            };
        }
        $navData = yield $this->service->getNavService()->getNavigation($pid,$region);
        if(empty($navData)){
             return $navData;
        }
        $class = ['fa-home','fa-user','fa-play-circle-o','fa-list','fa-cubes','fa-envelope'];
        foreach ($navData as $key => $value) {
            $navData[$key]['class'] = isset($class[$key]) ? $class[$key] : 'fa-play-circle-o';
            $navData[$key]['subData'] = yield $this->service->getNavService()->getNavigation($value['id'],1);
        }
        if($this->openCache) {
            yield  $this->getComm()->getRedis()->set($cacheKey, json_encode($navData), $this->cacheTime);
        }
        return $navData;
     }

}

