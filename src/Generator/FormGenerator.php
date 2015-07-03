<?php

namespace Pharam\Generator;

use Pharam\Generator\Field\Date;

/**
 * Default Form Generator
 */
class FormGenerator implements FormGeneratorInterface
{

    public function generate()
    {
        // TODO: Implement generate() method.
       
        if (is_object($objAllElemnt)) {
            foreach ($objAllElemnt as $propElement) {
                $htmlOutput.=$this->divZendContainer($propElement);
            }
        }
        

    }

    public function divZendContainer($objElement)
    {
        $divOutput = '<div class="group">
                        <label>Transaction:</label>
                        <div class="controls">';
        if (is_object($objElement)) {
            $divOutput.=$objProp->Field->getHtml();
        }
        $divOutput.=' </div>
                    </div>';
        return $divOutput;
    }

}
