<?php
/**
 * This custom block is the alternative way to using core template module and 
 * app/design/frontend/base/default/template/example/Welcome.phtml template file

**/
class AlesW_Example_Block_Welcome extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('example/welcome.phtml');  // app/design/frontend/base/default/template/example/Welcome.phtml
    }
}
