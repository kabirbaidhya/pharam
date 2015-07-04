<?php

namespace Pharam\Generator\Element;

/**
 * Class AbstractElement
 * @package Pharam\Generator\Element
 */
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
     * Get name property from attributes array
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * Set Name property to attributes array
     * @param string $name
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);
    }

    /**
     * Get all attributes from attribute array
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set attributes.
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

    /**
     * @param string $key
     * @return string
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Get Label
     * @return Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set Label
     * @param Label $label
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    /**
     * Get is required field to an object.
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * Set is required field to an object.
     * @param bool $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * Get atttribute ID
     * @return string
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * Set attribute Id.
     * @param string $id
     */
    public function setId($id)
    {
        return $this->setAttribute('id', $id);
    }
}
