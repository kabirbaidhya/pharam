<?php

namespace Pharam\Generator;

/**
 * Interface FormGeneratorInterface
 * @package Pharam\Generator
 */
interface FormGeneratorInterface
{
    /**
     * @return mixed
     */
    public function generate();

    /**
     * @return mixed
     */
    public function getElements();

    /**
     * @return mixed
     */
    public function getMapper();

    /**
     * @param Mapper $mapper
     * @return mixed
     */
    public function setMapper(Mapper $mapper);

}
