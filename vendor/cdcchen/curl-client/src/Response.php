<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/10
 * Time: 03:14
 */

namespace cdcchen\net\curl;


/**
 * Class Response
 * @package cdcchen\net\curl
 */
class Response extends Object
{
    /**
     * @var string|null raw content
     */
    private $_content;

    /**
     * @var array
     */
    private $_headers;

    /**
     * @param $content
     * @return static
     */
    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @param array $headers
     * @return static
     */
    public function setHeaders($headers)
    {
        $this->_headers = $headers;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }
}