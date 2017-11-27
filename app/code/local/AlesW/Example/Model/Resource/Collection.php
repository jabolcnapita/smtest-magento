<?php
class AlesW_Example_Model_Resource_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
        parent::_construct();

        $this->_init('example/event');
    }
}