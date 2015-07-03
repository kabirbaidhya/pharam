<?php

namespace Pharam\Generator;

interface FormGeneratorInterface
{
    public function generate();

    public function getElements();

    public function getMapper();

    /**
     * @param Mapper $mapper
     * @return mixed
     */
    public function setMapper(Mapper $mapper);

}
