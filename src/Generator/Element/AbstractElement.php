<?php

namespace Pharam\Generator\Element;

abstract class AbstractElement implements ElementInterface
{
    /**
     * @var array
     */
    protected $attributes;
    protected $label;
    protected $required;

    public function __construct(array $attributes)
    {
        $this->setAttributes($attributes);

        $this->label = human_readable($this->getName());
    }

    public function getName()
    {
        return $this->getAttribute('name');
    }

    public function setName($name)
    {
        $this->setAttribute('name', $name);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function isRequired()
    {
        return  $this->required;
    }

    public function setRequired($required)
    {
        $this->required = $required;
    }
}
