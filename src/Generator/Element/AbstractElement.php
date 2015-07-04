<?php

namespace Pharam\Generator\Element;

abstract class AbstractElement implements ElementInterface
{
    /**
     * @var Label
     */
    protected $label;

    /**
     * @var bool
     */
    protected $required;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->setAttributes($attributes);
        $this->setLabel(new Label($this));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);
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
     * @param string $key
     * @param string $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @param string $key
     * @return string
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    /**
     * @return Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param Label $label
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        return $this->setAttribute('id', $id);
    }
}
