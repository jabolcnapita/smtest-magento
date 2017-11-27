<?php
/**
 * app/code/local/AlesW/Example/controllers/Adminhtml/ExampleController.php
 *
 * URL: domain.local/index.php/admin/example/index/
 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        /*
    	// When page loads do some DB inserts for testing
    	$event = Mage::getModel('example/event');				// instantiate model class
    	$event->setName('Test Event')->save();					// set data on model and save

    	// get some feedback on screen
    	Mage::getSingleton('adminhtml/session')->addSuccess(
    		'Event saved. ID = ' . $event->getId()
    	);
        */

        $this->loadLayout();
        // Add content to main layout
        // Block is in Block/Adminhtml/Event/Edit.php file
        $this->_addContent(
            $this->getLayout()->createBlock('example/adminhtml_event_edit')
        );

        return $this->renderLayout();
    }
}