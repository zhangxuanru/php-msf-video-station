<?php
/**
 * Service
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers\Helper;

use PG\MSF\Base\Core;

class Logic extends Core
{
    public function getVideoLogic()
    {
        return $this->getObject(VideoLogic::class);
    }

    public function getNavLogic()
    {
        return $this->getObject(NavLogic::class);
    }

    public function getTagsLogic()
    {
        return $this->getObject(TagsLogic::class);
    }

    public function getCateLogic()
    {
        return $this->getObject(CategoryLogic::class);
    }

    public function getCommentLogic()
    {
        return $this->getObject(CommentLogic::class);
    }

    public function getSearchLogic()
    {
        return $this->getObject(SearchLogic::class);
    }


}



