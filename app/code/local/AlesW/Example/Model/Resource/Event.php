<?php
/**
 * app/code/local/AlesW/Model/Resource/Event.php
 *
 * This is the Resource class needed by Event module in Model/Event.php
 *
 * @author    Ales Watzak
 * @category  AlesW
 * @package   Example
 */
class AlesW_Example_Model_Resource_Event extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('example/event', 'event_id'); 	// first param identifies model, second is db table primary key
    }
}
