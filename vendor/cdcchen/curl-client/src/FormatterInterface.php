<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/11
 * Time: 15:43
 */

namespace cdcchen\net\curl;


/**
 * Interface FormatterInterface
 * @package cdcchen\net\curl
 */
interface FormatterInterface
{
    /**
     * Formats given HTTP request message.
     * @param HttpRequest $request HTTP request instance.
     * @return Request formatted request.
     */
    public function format(HttpRequest $request);
}