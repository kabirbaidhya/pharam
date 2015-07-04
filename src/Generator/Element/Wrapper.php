<?php

namespace Pharam\Generator\Element;

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
    public function __construct($tagName, array $elements = [])
    {
        $this->elements = $elements;
        $this->tagName = $tagName;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $attributes = '';
        foreach ($this->attributes as $key => $value) {
            if ($value == '') {
                continue;
            }
            $attributes .= " " . $key . "=\"" . $value . "\"";
        }

        $html = '<' . $this->tagName . ($attributes ? $attributes : '') . '>';

        foreach ($this->elements as $element) {
            $html .= $element->getHtml();
        }

        $html .= '</' . $this->tagName . '>';

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
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

}
