<?php

namespace Pharam\Generator\Element;

interface ElementInterface
{

    public function getName();

    public function setName($name);

    public function getHtml();

    public function getAttributes();

    public function setAttributes(array $attributes);

    public function setAttribute($key, $value);

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

    public function isRequired();

    public function setRequired($required);

    public function setId($id);
}
