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
     * @param array $attributes
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

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param array $elements
     */
    public function setElements(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
    }

}
