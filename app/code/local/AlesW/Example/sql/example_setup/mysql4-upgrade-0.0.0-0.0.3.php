<?php

/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();

$this->run("
CREATE TABLE {$this->getTable('example/event')} (
	    `log_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
	    `date` DATETIME,
	    `store_id` INTEGER,
	    `product_id` INTEGER,
	    `before` VARCHAR(255),
	    `username` VARCHAR(255)
);
");

$this->endSetup();