<?php
/**
 * app/code/local/AlesW/Block/Adminhtml/Event/Edit.php
 *

 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'event_id';
        $this->_blockGroup = 'example';
        $this->_controller = 'adminhtml_event'; // blockGroup and controller will load block in Example ... Block/Adminhtml/Event/Edit/Form.php

        parent::__construct();
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return Mage::helper('example')->__('New Event');
    }
}
