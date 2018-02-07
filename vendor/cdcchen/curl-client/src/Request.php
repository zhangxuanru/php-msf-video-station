<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 15/5/4
 * Time: 下午5:58
 */

namespace cdcchen\net\curl;


/**
 * Class Request
 * @package cdcchen\net\curl
 */
class Request extends Object
{
    /**
     * @var bool
     */
    public $debug = false;

    /**
     * @var array
     */
    protected static $defaultOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_DNS_USE_GLOBAL_CACHE => true,
        CURLOPT_FORBID_REUSE => true,
    ];

    /**
     * @var array
     */
    private $_options = [];
    /**
     * @var string
     */
    private $_url;

    /**
     * @var array
     */
    private $_transferInfo;


    /**
     * Request constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->addDefaultOptions()->addOptions($options);
    }

    /**
     * @param bool $value
     * @return static
     */
    public function setDebug($value = false)
    {
        $this->debug = (bool)$value;
        return $this->addOption(CURLOPT_VERBOSE, $this->debug);
    }

    /**
     * @param array $options
     * @return static
     */
    public function setOptions(array $options)
    {
        return $this->clearOptions()->addOptions($options);
    }

    /**
     * @return static
     */
    private function addDefaultOptions()
    {
        return $this->addOptions(static::$defaultOptions);
    }

    /**
     * @param string $option
     * @param mixed $value
     * @return static
     */
    public function addOption($option, $value)
    {
        $this->_options[$option] = $value;
        return $this;
    }

    /**
     * @param array $options
     * @return static
     */
    public function addOptions(array $options)
    {
        foreach ($options as $option => $value) {
            $this->addOption($option, $value);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param string|array $options
     * @return static
     */
    public function removeOptions($options)
    {
        $options = (array)$options;
        foreach ($options as $option) {
            unset($this->_options[$option]);
        }

        return $this;
    }

    /**
     * @param bool $setDefaultOptions
     * @return static
     */
    public function resetOptions($setDefaultOptions = true)
    {
        $this->clearOptions();
        if ($setDefaultOptions) {
            $this->addOptions(static::$defaultOptions);
        }

        return $this;
    }

    /**
     * @return static
     */
    public function clearOptions()
    {
        $this->_options = [];
        return $this;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl($url)
    {
        $this->_url = $url;
        return $this->addOption(CURLOPT_URL, $url);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param array $options
     * @param bool $append
     */
    public static function setDefaultOptions(array $options, $append = false)
    {
        if ($append) {
            foreach ($options as $option => $value) {
                static::$defaultOptions[$option] = $value;
            }
        } else {
            static::$defaultOptions = $options;
        }
    }

    /**
     * @param null|string $option
     * @return array|mixed
     */
    public static function getDefaultOptions($option = null)
    {
        return ($option === null) ? static::$defaultOptions : static::$defaultOptions[$option];
    }

    /**
     * @param array $options
     * @param array $options1
     * @return array
     */
    public static function mergeOptions(array $options, array $options1)
    {
        foreach ($options1 as $index => $value) {
            $options[$index] = $value;
        }

        return $options;
    }

    /**
     * @return bool|Response|HttpResponse
     * @throws \Exception
     */
    public function send()
    {
        $handle = curl_init();
        if (!$this->beforeRequest($this, $handle)) {
            return false;
        }

        $this->prepare();
        $this->addOption(CURLOPT_VERBOSE, $this->debug);

        $headers = [];
        $this->setHeaderOutput($this, $headers);
        curl_setopt_array($handle, $this->getOptions());
        $content = curl_exec($handle);

        // check cURL error
        $errorNumber = curl_errno($handle);
        $errorMessage = curl_error($handle);
        $this->_transferInfo = curl_getinfo($handle);
        $this->afterRequest($this, $handle);
        curl_close($handle);

        if ($errorNumber !== CURLE_OK) {
            throw new RequestException('Curl error: #' . $errorNumber . ' - ' . $errorMessage, $errorNumber);
        }

        return static::createResponse($content, $headers);
    }

    /**
     * prepare request params
     */
    public function prepare()
    {
    }

    /**
     * @param array $requests
     */
    public function batchExecute(array $requests)
    {
    }

    /**
     * @param Request $request
     * @param resource $handle curl_init resource
     * @return bool
     */
    protected function beforeRequest(Request $request, $handle)
    {
        return true;
    }

    /**
     * @param Request $request
     * @param resource $handle
     */
    protected function afterRequest(Request $request, $handle)
    {
    }

    /**
     * @param Request $request
     * @param array $output
     */
    private function setHeaderOutput(Request $request, array &$output)
    {
        $request->addOption(CURLOPT_HEADERFUNCTION, function ($handle, $headerString) use (&$output) {
            $header = trim($headerString, "\r\n");
            if (strlen($header) > 0) {
                $output[] = $header;
            }
            return mb_strlen($headerString, '8bit');
        });
    }

    /**
     * @param string $content
     * @param array $headers
     * @return Response
     */
    protected static function createResponse($content, $headers)
    {
        return (new Response())->setContent($content)->setHeaders($headers);
    }

    /**
     * @param null|string $opt
     * @return array|mixed
     */
    public function getTransferInfo($opt = null)
    {
        return $opt === null ? $this->_transferInfo : $this->_transferInfo[$opt];
    }
}