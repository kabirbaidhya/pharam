<?php

namespace Pharam\Generator\Element;
/**
 * Interface ElementInterface
 * @package Pharam\Generator\Element
 */
interface ElementInterface
{
    /**
     * @return string name
     */
    public function getName();

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * @return string HTML output
     */
    public function getHtml();

    /**
     * @return array attributes
     */
    public function getAttributes();

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes);

    /**
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value);

    /**
     * @param $key
     * @return string attribute
     */
    public function getAttribute($key);

    /**
     * @return Label
     */
    public function getLabel();

    /**
     * @return string
     */
    public function getId();

    /**
     * @param Label $label
     */
    public function setLabel(Label $label);

    /**
     * @return boolean
     */
    public function isRequired();

    /**
     * @param $required
     */
    public function setRequired($required);

    /**
     * @param $id
     */
    public function setId($id);
}
