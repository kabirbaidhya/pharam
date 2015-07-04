<?php


namespace Pharam\Generator;

use Pharam\Generator\Element\Wrapper;

class BootstrapTemplate implements FormTemplateInterface
{
    /**
     * @return Wrapper
     */
    public function getFormWrapper()
    {
        $wrapper = new Wrapper('form');
        $wrapper->setAttributes([
            'role' => 'form'
        ]);

        return $wrapper;
    }

    /**
     * @return Wrapper
     */
    public function getInputWrapper()
    {
        $wrapper = new Wrapper('div');
        $wrapper->setAttributes([
            'class' => 'form-group'
        ]);

        return $wrapper;
    }

    /**
     * @return string
     */
    public function getInputClass()
    {
        return 'form-control';
    }

    /**
     * @return string
     */
    public function getLabelClass()
    {
        return 'control-label';
    }
}
