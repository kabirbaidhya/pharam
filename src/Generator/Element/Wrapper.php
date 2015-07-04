<?php

namespace Pharam\Generator\Element;
/**
 * Class Wrapper Wrap html tag within the element
 * @package Pharam\Generator\Element
 */
class Wrapper
{
    /**
     * @var array
     */
    protected $elements;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var string
     */
    private $tagName;

    /**
     * @param string $tagName
     * @param array $elements
     */
    public function __construct($tagName, array $elements = [], array $attributes = [])
    {
        $this->elements = $elements;
        $this->tagName = $tagName;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $html = $this->openTag();

        foreach ($this->elements as $element) {
            $html .= $element->getHtml();
        }

        $html .= $this->closeTag();

        return $html;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function openTag()
    {
        $attributes = '';
        foreach ($this->attributes as $key => $value) {
            if ($value == '') {
                continue;
            }
            $attributes .= " " . $key . "=\"" . $value . "\"";
        }

        $html = '<' . $this->tagName . ($attributes ? $attributes : '') . '>';

        return $html;
    }

    public function closeTag()
    {
        return '</' . $this->tagName . '>';
    }

}
