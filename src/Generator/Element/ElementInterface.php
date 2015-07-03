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

    public function getLabel();

    public function setLabel($label);

    public function isRequired();

    public function setRequired($required);
}
