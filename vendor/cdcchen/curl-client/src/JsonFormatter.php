<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/11
 * Time: 15:43
 */

namespace cdcchen\net\curl;


/**
 * Class JsonFormatter
 * @package cdcchen\net\curl
 */
class JsonFormatter implements FormatterInterface
{
    /**
     * @var integer the encoding options.For more details please refer to
     * <http://www.php.net/manual/en/function.json-encode.php>.
     */
    public $encodeOptions = 320; // JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

    /**
     * @param HttpRequest $request
     * @return HttpRequest
     */
    public function format(HttpRequest $request)
    {
        $request->addHeader('Content-Type', 'application/json; charset=UTF-8');
        $request->setContent(json_encode($request->getData(), $this->encodeOptions));

        return $request;
    }
}