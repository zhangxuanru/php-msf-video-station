<?php
/**
 * Service
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */ 

namespace App\Lib\Service; 


use PG\MSF\Base\Core;
use App\Services\NavService;
use App\Services\VideoService;
use App\Services\BaseService;
use App\Services\TagsService;
use App\Services\CommentService;
use App\Services\SearchService;
 
class Services extends Core
{
    public function getNavService()
  {
       return $this->getObject(NavService::class);
  }

  public function getVideoService()
  {
     return $this->getObject(VideoService::class);	
  }

  public function getTagsService()
  {
     return $this->getObject(TagsService::class);
  }

  public function getCommentService()
  {
    return $this->getObject(CommentService::class);
  }

   public function getBaseService()
  {
     return $this->getObject(BaseService::class);
  }

    public function getSearchService()
    {
        return $this->getObject(SearchService::class);
    }





}

