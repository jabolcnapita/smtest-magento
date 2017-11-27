<?php
/**
 * app/code/local/AlesW/Example/controllers/HelloController.php
 *
 * Controller defines the pages and load the layout files for those pages.
 * If we only specify frontname and controller "example/hello" in the URL 
 * without action method, Magento uses indexAction() method
 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_HelloController extends Mage_Core_Controller_Front_Action
{
	// process URL: domain/example/hello/world
	// domain ... mymagento.local
	// example ... defined by <frontName>example</frontName> in config.xml
	// hello ... controller name perhaps because it extends Mage_Core_Controller_Front_Action ??
	// world ... refers to method worldAction() in controller
    public function worldAction()
    {
        echo 'Hello, World!';
    }

    public function indexAction()
    {
        echo "Hello, Index!";
    }    
}