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
            'role' => 'form',
            'class' => 'form-horizontal'
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
            'class' => 'col-sm-10'
        ]);

        return $wrapper;
    }

    /**
     * @return Wrapper
     */
    public function getInputRowWrapper()
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
        return 'control-label col-sm-2';
    }

    /**
     * @return string
     */
    public function getButtonClass()
    {
        return 'btn btn-default';
    }

    /**
     * @return string
     */
    public function getSubmitButtonClass()
    {
        return 'btn btn-primary';
    }
}
