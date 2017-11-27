<?php
/**
 * app/code/local/AlesW/Model/Event.php
 *
 * This is the Model class needed for mapping ti DB table
 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_Model_Event extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('example/event');	// initialize resource for this model
        								// we need to create resource for events .. in Model/Resource/Event.php
    }
}
