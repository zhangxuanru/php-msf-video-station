<?php
/**
 * 视频图片模块
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9
 * Time: 16:40
 */

namespace App\Models;

class VideoImagesModel extends BaseModel
{
    public static $tableName = 'grab_video_images';

    private $field = 'id,video_id,img_source_url,fillename,is_cover,qiniu_upload,width,height';

    public function __construct()
    {
        parent::__construct();
        parent::$tableName = self::$tableName;
    }

   /**
     * [getVideoImagesData 获取视频图片数据]
     * @param  array $videoIdList    [视频ID列表]
     * @param   bool $is_cover
     * @return [type]            [description]
     */
    public function getVideoImagesData($videoIdList,$is_cover = true)
    {
        if(empty($videoIdList)){
            return [];
        }
    	$where['is_del'] = ['symbol' => '=','value' => 0];
        if($is_cover){
            $where['is_cover'] = ['symbol' => '=','value' => 1];
        }
        $where['video_id'] = ['symbol' => 'in','value' => $videoIdList];
    	$data = yield $this->getList($this->field,$where);
    	return $data; 
    }

}


