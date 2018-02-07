<?php
/**
 * 公共的一些处理方法
 * Created by PhpStorm.
 * User: zxr
 * Date: 2019/1/13
 * Time: 15:21
 */
namespace App\Lib\Tool;
use PG\MSF\Base\Core;

class Comm extends Core
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取config信息
     */
    public function getConfigData()
    {
        $assign = [
            'imagesDomain' => $this->getConfig()->get('constant.QINIU_IMAGES_DOMAIN'),
            'videoDomain'  => $this->getConfig()->get('constant.QINIU_VIDEO_DOMAIN'),
            'static_version' =>  $this->getConfig()->get('constant.STATIC_VERSION'),
            'static_url'     => $this->getConfig()->get('constant.STATIC_URL')
        ];
        return $assign;
    }

    /**
     * 生成图片链接地址
     * @param $image_file_name
     * @param bool $zoom
     * @param int $width
     * @param int $height
     * @param  string $zoomStr  可跟样式名称
     * @param  $force :是否强制设置宽高
     * @return string
     */
    public function generatePictureLinks($image_file_name,$zoom = false,$width = 0,$height = 0,$force=true,$zoomStr = '')
    {
        $config  = $this->getConfigData();
        $domain  = $config['imagesDomain'];
        $img_url = $domain.'/'.$image_file_name.'?version='.$config['static_version'];
        if(!empty($zoomStr)){
            $img_url .= $zoomStr;
            return $img_url;
        }
        $zoomStr = "";
        if($zoom){
            if(empty($width) && empty($height)){
                return $img_url;
            }
            if(empty($height)){
                $zoomStr ='&imageMogr2/thumbnail/'.$width.'x/blur/1x0/quality/80|imageslim';
            }elseif(empty($width)){
                $zoomStr ='imageMogr2/thumbnail/x'.$height.'/blur/1x0/quality/75|imageslim';
            }
            if(!empty($width) && !empty($height)){
                 if($force){
                    $zoomStr = '&imageMogr2/thumbnail/'.$width.'x'.$height.'!/blur/1x0/quality/95|imageslim';
                }else{
                   $zoomStr='&imageView2/1/w/'.$width.'/h/'.$height.'/q/80|imageslim';
                }
            }
        }
        $img_url .= $zoomStr;
        return $img_url;
    }

    /**
     * 生成视频播放地址
     * @param string $fileName
     */
    public function generateVideoLinks($fileName = '')
    {
        $config  = $this->getConfigData();
        $domain  = $config['videoDomain'];
        $videoUrl  = $domain.'/'.$fileName.'?version='.$config['static_version'];
        return $videoUrl;
    }




    /**
     * 生成链接地址
     * @param string $url
     * @param $video_id
     * @param  $params
     */
    public function  generateLinks($url,$params='')
    {
        $encryptObj  =  $this->getObject(UrlEncrypt::class);
        $encryptParams = $encryptObj->encrypt_url($params);
        $link = $url.$encryptParams;
        return $link;
    }

    /**
     * 获取REDIS对象
     * @return mixed
     */
    public function getRedis()
    {
        $obj = $this->getObject(Redis::class);
        return  $obj->getRedisInstance();
    }

}
