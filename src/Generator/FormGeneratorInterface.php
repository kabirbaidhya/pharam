<?php

namespace Pharam\Generator;

/**
 * Interface FormGeneratorInterface
 * @package Pharam\Generator
 */
interface FormGeneratorInterface
{
    /**
     * Generates the Form and returns the output
     *
     * @return mixed
     */
    public function generate();

    /**
     * Returns the list of form elements
     *
     * @return mixed
     */
    public function getElements();

    /**
     * Returns the Mapper that maps the database columns to the form elements
     *
     * @return mixed
     */
    public function getMapper();

    /**
     * Sets the Mapper
     *
     * @param Mapper $mapper
     * @return mixed
     */
    public function setMapper(Mapper $mapper);

    /**
     * @param FormTemplateInterface $template
     */
    public function setTemplate(FormTemplateInterface $template);

    /**
     * @return FormTemplateInterface
     */
    public function getTemplate();

}
