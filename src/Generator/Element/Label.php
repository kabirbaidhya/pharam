<?php

namespace Pharam\Generator\Element;
/**
 * Class Label to generate Label html tag
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
     * @param ElementInterface $element
     */
    public function __construct(ElementInterface $element)
    {
        $this->setElement($element);
        $this->setText(human_readable($element->getName()));
    }

    /**
     * Function to generate HTML element for required field
     * @return string
     */
    public function getHtml()
    {
        $requiredSpan = $this->getElement()->isRequired() ? "<span>*</span>" : '';

        return sprintf('<label for="%s">%s %s</label>', $this->getElement()->getId(), $this->getText(), $requiredSpan);
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
}
