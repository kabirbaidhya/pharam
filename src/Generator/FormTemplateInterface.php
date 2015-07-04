<?php
namespace Pharam\Generator;

use Pharam\Generator\Element\Wrapper;

interface FormTemplateInterface
{
    /**
     * @return Wrapper
     */
    public function getFormWrapper();

    /**
     * @return Wrapper
     */
    public function getInputWrapper();

    /**
     * @return Wrapper
     */
    public function getInputRowWrapper();

    /**
     * @return string
     */
    public function getInputClass();

    /**
     * @return string
     */
    public function getLabelClass();

    /**
     * @return string
     */
    public function getButtonClass();

    /**
     * @return string
     */
    public function getSubmitButtonClass();
}
