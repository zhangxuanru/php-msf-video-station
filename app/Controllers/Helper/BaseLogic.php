<?php
/**
 *  Video Logic Helper
 *
 * @author strive965432@gmail.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */
namespace App\Controllers\Helper;

use PG\MSF\Base\Core;
use App\Lib\Tool\FuncS;
use App\Lib\Service\Services;
use App\Lib\Tool\Comm;


class BaseLogic extends Core
{
    protected  $service = null;

    protected  $isMobile = false;

    protected $openCache = true;

    public function __construct()
    {
        $this->service  = $this->getObject(Services::class);
    }

    public function getComm()
    {
        $obj = $this->getObject(Comm::class);
        return $obj;
    }


}

