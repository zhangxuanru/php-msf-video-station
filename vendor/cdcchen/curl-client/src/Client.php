<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 15/5/4
 * Time: 下午5:58
 */

namespace cdcchen\net\curl;


    /**
     * Class Client
     * @package cdcchen\net\curl
     */
/**
 * Class Client
 * @package cdcchen\net\curl
 */
class Client extends Object
{
    /**
     * Http GET method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function get($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('get', $url, $data, $headers, $options);
    }

    /**
     * Http POST method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function post($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('post', $url, $data, $headers, $options);
    }

    /**
     * Http PUT method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function put($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('put', $url, $data, $headers, $options);
    }

    /**
     * Http GET method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function head($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('head', $url, $data, $headers, $options)
                     ->addOption(CURLOPT_NOBODY, true);
    }

    /**
     * Http PATCH method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function patch($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('patch', $url, $data, $headers, $options);
    }

    /**
     * Http OPTIONS method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function options($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('options', $url, $data, $headers, $options);
    }

    /**
     * Http DELETE method request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function delete($url, $data = null, $headers = [], $options = [])
    {
        return static::createHttpRequestShortcut('delete', $url, $data, $headers, $options);
    }

    /**
     * Http upload request shortcut
     *
     * @param string $url
     * @param null|array $data
     * @param array $files
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    public static function upload($url, $files = [], $data = null, $headers = [], $options = [])
    {
        $request = static::createHttpRequestShortcut('post', $url, $data, $headers, $options);
        foreach ($files as $name => $file) {
            $request->addFile($name, $file);
        }

        return $request;
    }

    /**
     * @param string $method
     * @param string $url
     * @param null|array $data
     * @param array $headers
     * @param array $options
     * @return HttpRequest
     */
    private static function createHttpRequestShortcut($method, $url, $data, $headers, $options)
    {
        /* @var HttpRequest $request */
        $request = (new HttpRequest())
            ->setMethod($method)
            ->addHeaders($headers)
            ->setUrl($url)
            ->addOptions($options);

        if (is_array($data)) {
            $request->setData($data);
        } else {
            $request->setContent($data);
        }

        return $request;
    }
}