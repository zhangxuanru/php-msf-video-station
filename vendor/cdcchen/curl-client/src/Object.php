<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/6/14
 * Time: 14:46
 */

namespace cdcchen\net\curl;


/**
 * Class Object
 * @package cdcchen\aliyun\core\base
 */
class Object
{
    /**
     * @return string
     */
    public static function className()
    {
        return get_called_class();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasMethod($name)
    {
        return method_exists($this, $name);
    }

}