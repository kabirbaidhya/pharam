<?php

namespace Pharam\Generator\Element;

/**
 * Class Label
 * @package Pharam\Generator\Element
 */
class Label
{
    /**
     * @var ElementInterface
     */
    protected $element;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var array
     */
    protected $attributes;


    /**
     * @param ElementInterface $element
     */
    public function __construct(ElementInterface $element)
    {
        $this->setElement($element);
        $this->setText(human_readable($element->getName()));
        $this->setAttributes([
            'for' => $this->getElement()->getId()
        ]);
    }

    /**
     * Function to generate HTML element for required field
     * @return string
     */
    public function getHtml()
    {
        $requiredSpan = $this->getElement()->isRequired() ? "<span>*</span>" : '';

        $attributes = '';

        foreach ($this->attributes as $key => $value) {
            if ($value == '') {
                continue;
            }
            $attributes .= " " . $key . "=\"" . $value . "\" ";
        }

        return sprintf('<label %s>%s %s</label>', $attributes, $this->getText(), $requiredSpan);
    }

    /**
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    /**
     * @return ElementInterface
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @param ElementInterface $element
     */
    public function setElement(ElementInterface $element)
    {
        $this->element = $element;
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

    /**
     * Set elements to attributes array
     * @param string $key
     * @param string $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

}
