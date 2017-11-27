<?php
/**
 * app/code/local/AlesW/Example/controllers/HelloController.php
 *
 * If we only specify frontname "example" in the URL without controller and action
 * Magento looks for default Index controller and default indexAction
 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_IndexController extends Mage_Core_Controller_Front_Action
{
	// magento.local/example
    public function indexAction()
    {
    	$this->loadLayout(); 					// load layout from app/design/frontend/base/default/layout/example.xml
        //echo "Hello, World! I'm in the index!";
        return $this->renderLayout();
    }
}
