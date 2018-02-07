<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/11
 * Time: 17:48
 */

namespace cdcchen\net\curl;


/**
 * Class UrlEncodedFormatter
 * @package cdcchen\net\curl
 */
class UrlEncodedFormatter implements FormatterInterface
{
    /**
     * @var integer URL encoding type.
     * Possible values are:
     *  - PHP_QUERY_RFC1738 - encoding is performed per 'RFC 1738' and the 'application/x-www-form-urlencoded' media type,
     *    which implies that spaces are encoded as plus (+) signs. This is most common encoding type used by most web
     *    applications.
     *  - PHP_QUERY_RFC3986 - then encoding is performed according to 'RFC 3986', and spaces will be percent encoded (%20).
     *    This encoding type is required by OpenID and OAuth protocols.
     */
    public $encodingType = PHP_QUERY_RFC1738;

    /**
     * @inheritdoc
     */
    public function format(HttpRequest $request)
    {
        $data = (array)$request->getData();
        $content = http_build_query($data, '', '&', $this->encodingType);
        if (strcasecmp('get', $request->getMethod()) === 0) {
            if (!empty($content)) {
                $url = $request->getUrl();
                $url .= (strpos($url, '?') === false) ? '?' : '&';
                $url .= $content;
                $request->setUrl($url);
            }
            return $request;
        }
        $request->addHeader('Content-Type', 'application/x-www-form-urlencoded');
        $request->setContent($content);
        return $request;
    }
}