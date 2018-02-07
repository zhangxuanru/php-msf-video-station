<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/4/11
 * Time: 17:48
 */

namespace cdcchen\net\curl;


use DOMDocument;
use DOMElement;
use DOMText;
use SimpleXMLElement;

/**
 * Class XmlFormatter
 * @package cdcchen\net\curl
 */
class XmlFormatter implements FormatterInterface
{
    /**
     * @var string the Content-Type header for the response
     */
    public $contentType = 'application/xml';
    /**
     * @var string the XML version
     */
    public $version = '1.0';
    /**
     * @var string the XML encoding. If not set, it will use the value of [[\yii\base\Application::charset]].
     */
    public $encoding = 'utf-8';
    /**
     * @var string the name of the root element.
     */
    public $rootTag = 'request';

    /**
     * @var string
     */
    public $itemTag = 'item';

    /**
     * @inheritdoc
     */
    public function format(HttpRequest $request)
    {
        $contentType = $this->contentType;
        $charset = $this->encoding;
        if (stripos($contentType, 'charset') === false) {
            $contentType .= '; charset=' . $charset;
        }
        $request->addHeader('Content-Type', $contentType);
        $data = $request->getData();
        if ($data !== null) {
            if ($data instanceof DOMDocument) {
                $content = $data->saveXML();
            } elseif ($data instanceof SimpleXMLElement) {
                $content = $data->saveXML();
            } else {
                $dom = new DOMDocument($this->version, $charset);
                $root = new DOMElement($this->rootTag);
                $dom->appendChild($root);
                $this->buildXml($root, $data);
                $content = $dom->saveXML();
            }
            $request->setContent($content);
        }
        return $request;
    }

    /**
     * @param DOMElement $element
     * @param mixed $data
     */
    protected function buildXml($element, $data)
    {
        if (is_object($data)) {
            $child = new DOMElement(static::pathBasename(get_class($data)));
            $element->appendChild($child);

            $array = [];
            foreach ($data as $name => $value) {
                $array[$name] = $value;
            }

            $this->buildXml($child, $array);

        } elseif (is_array($data)) {
            foreach ($data as $name => $value) {
                if (is_int($name) && is_object($value)) {
                    $this->buildXml($element, $value);
                } elseif (is_array($value) || is_object($value)) {
                    $child = new DOMElement(is_int($name) ? $this->itemTag : $name);
                    $element->appendChild($child);
                    $this->buildXml($child, $value);
                } else {
                    $child = new DOMElement(is_int($name) ? $this->itemTag : $name);
                    $element->appendChild($child);
                    $child->appendChild(new DOMText((string)$value));
                }
            }
        } else {
            $element->appendChild(new DOMText((string)$data));
        }
    }

    /**
     * @param string $path
     * @return string
     */
    private static function pathBasename($path)
    {
        $path = rtrim(str_replace('\\', '/', $path), '/\\');
        if (($pos = mb_strrpos($path, '/')) !== false) {
            return mb_substr($path, $pos + 1);
        }
        return $path;
    }
}