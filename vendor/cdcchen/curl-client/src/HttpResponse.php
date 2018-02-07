<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/10
 * Time: 04:41
 */

namespace cdcchen\net\curl;


/**
 * Class HttpResponse
 * @package cdcchen\net\curl
 */
class HttpResponse extends Response
{
    /**
     *
     */
    const STATUS_HEADER_NAME = 'http-code';

    /**
     * @var array headers.
     */
    private $_headers = [];

    /**
     * @var array cookies.
     */
    private $_cookies;

    /**
     * @var mixed content data
     */
    private $_data;

    /**
     * @var string content format name
     */
    private $_format;


    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        if ($this->_data === null) {
            $content = $this->getContent();
            if (!empty($content)) {
                $data = $this->getParser()->parse($this);
                $this->setData($data);
            }
        }
        return $this->_data;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->_headers = $this->parseHeaders($headers);
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * @param string $name
     * @return bool|mixed
     */
    public function getHeader($name)
    {
        return isset($this->_headers[$name]) ? $this->_headers[$name] : null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasHeader($name)
    {
        return isset($this->_headers[$name]);
    }

    /**
     * @param array $headers
     * @return array
     */
    public function parseHeaders($headers)
    {
        $_headers = [];
        $headers = array_unique((array)$headers);
        foreach ($headers as $name => $value) {
            if (!is_int($name)) {
                $_headers[$name] = $value;
                continue;
            }

            // parse raw header :
            $rawHeader = $value;
            if (($separatorPos = strpos($rawHeader, ':')) !== false) {
                $name = strtolower(trim(substr($rawHeader, 0, $separatorPos)));
                $value = trim(substr($rawHeader, $separatorPos + 1));
                if (isset($_headers[$name])) {
                    $_headers[$name] = (array)$_headers[$name];
                    array_push($_headers[$name], $value);
                } else {
                    $_headers[$name] = $value;
                }
            } elseif (strpos($rawHeader, 'HTTP/') === 0) {
                $parts = explode(' ', $rawHeader, 3);
                $_headers[self::STATUS_HEADER_NAME] = $parts[1];
            } else {
                $_headers['raw'] = $rawHeader;
            }
        }
        return $_headers;
    }

    /**
     * @return bool
     */
    public function isOK()
    {
        return $this->getHeader(self::STATUS_HEADER_NAME) == 200;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        $status = $this->getHeader(self::STATUS_HEADER_NAME);
        return $status >= 200 && $status < 300;
    }

    /**
     * @return int|null
     */
    public function getStatus()
    {
        return $this->getHeader(self::STATUS_HEADER_NAME);
    }

    /**
     * Sets body format.
     * @param string $format body format name.
     * @return $this self reference.
     */
    public function setFormat($format)
    {
        $this->_format = $format;
        return $this;
    }

    /**
     * Returns body format.
     * @return string body format name.
     */
    public function getFormat()
    {
        if ($this->_format === null) {
            $this->_format = $this->defaultFormat();
        }
        return $this->_format;
    }

    /**
     * Returns HTTP message parser instance for the specified format.
     * @return ParserInterface parser instance.
     * @throws \InvalidArgumentException on invalid format name.
     */
    private function getParser()
    {
        static $defaultParsers = [
            HttpRequest::FORMAT_JSON => 'cdcchen\net\curl\JsonParser',
            HttpRequest::FORMAT_URLENCODED => 'cdcchen\net\curl\UrlEncodedParser',
            HttpRequest::FORMAT_RAW_URLENCODED => 'cdcchen\net\curl\UrlEncodedParser',
            HttpRequest::FORMAT_XML => 'cdcchen\net\curl\XmlParser',
        ];

        if (!isset($defaultParsers[$this->getFormat()])) {
            throw new \InvalidArgumentException("Unrecognized format '{$this->getFormat()}'");
        }
        $parser = $defaultParsers[$this->getFormat()];

        if (!is_object($parser)) {
            $parser = new $parser;
        }

        return $parser;
    }

    /**
     * Returns default format automatically detected from headers and content.
     * @return null|string format name, 'null' - if detection failed.
     */
    protected function defaultFormat()
    {
        $format = $this->detectFormatByHeaders($this->getHeaders());
        if ($format === null) {
            $format = $this->detectFormatByContent($this->getContent());
        }
        return $format;
    }

    /**
     * Detects format from headers.
     * @param array $headers source headers.
     * @return null|string format name, 'null' - if detection failed.
     */
    protected function detectFormatByHeaders(array $headers)
    {
        $contentType = $headers['content-type'];
        if (!empty($contentType)) {
            if (stripos($contentType, 'json') !== false) {
                return HttpRequest::FORMAT_JSON;
            }
            if (stripos($contentType, 'urlencoded') !== false) {
                return HttpRequest::FORMAT_URLENCODED;
            }
            if (stripos($contentType, 'xml') !== false) {
                return HttpRequest::FORMAT_XML;
            }
        }
        return null;
    }

    /**
     * Detects response format from raw content.
     * @param string $content raw response content.
     * @return null|string format name, 'null' - if detection failed.
     */
    protected function detectFormatByContent($content)
    {
        if (preg_match('/^\\{.*\\}$/is', $content)) {
            return HttpRequest::FORMAT_JSON;
        }
        if (preg_match('/^[^=|^&]+=[^=|^&]+(&[^=|^&]+=[^=|^&]+)*$/', $content)) {
            return HttpRequest::FORMAT_URLENCODED;
        }
        if (preg_match('/^<.*>$/s', $content)) {
            return HttpRequest::FORMAT_XML;
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getCookies()
    {
        if (count($this->_cookies) === 0 && $this->hasHeader('set-cookie')) {
            $cookieStrings = $this->getHeader('set-cookie');
            foreach ((array)$cookieStrings as $cookieString) {
                $cookie = $this->parseCookie($cookieString);
                $this->_cookies[$cookie['name']] = $cookie;
            }
        }
        return $this->_cookies;
    }

    /**
     * Parses cookie value string, creating a [[Cookie]] instance.
     * @param string $cookieString cookie header string.
     * @return array cookie array.
     */
    private function parseCookie($cookieString)
    {
        $params = [];
        $pairs = explode(';', $cookieString);
        foreach ($pairs as $number => $pair) {
            $pair = trim($pair);
            if (strpos($pair, '=') === false) {
                $params[$this->normalizeCookieParamName($pair)] = true;
            } else {
                list($name, $value) = explode('=', $pair, 2);
                if ($number === 0) {
                    $params['name'] = $name;
                    $params['value'] = urldecode($value);
                } else {
                    $params[$this->normalizeCookieParamName($name)] = urldecode($value);
                }
            }
        }
        return $params;
    }

    /**
     * @param string $rawName raw cookie parameter name.
     * @return string name of [[Cookie]] field.
     */
    private function normalizeCookieParamName($rawName)
    {
        static $nameMap = [
            'expires' => 'expire',
            'httponly' => 'httpOnly',
            'max-age' => 'maxAge',
        ];
        $name = strtolower($rawName);
        if (isset($nameMap[$name])) {
            $name = $nameMap[$name];
        }
        return $name;
    }

}