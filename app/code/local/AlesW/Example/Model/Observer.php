<?php

class AlesW_Example_Model_Observer {
	public function controllerActionPredispatch($observer) {
		/* @var $observer Mage_Core_Model_Observer */
		Mage::log('Example - controllerActionPredispatch');
		//$controllerAction = $observer->getEvent()->getControllerAction();
		//Mage::log($controllerAction);
		// we can now do anything that a controler can do
		// let's log any POST parameters
		//Mage::log($controllerAction->getRequest()->getParams());
	}

	public function catalogProductSaveBefore($observer) {
		Mage::log('Example - catalogProductSaveBefore');
		$controllerAction = $observer->getEvent()->getControllerAction();
		Mage::log($controllerAction);		

		$product = $observer->getEvent()->getProduct();
		$storeID = $product->getStoreId();
		$productID = intval($product->getId());
		$modDate = date("Y-m-d H:m:s");

		// collect current product data
        //$product = $this->_getProduct();
        $productData = $product->getData();
        $editor  = Mage::getSingleton('admin/session')->getUser();
        $username = $editor->getUsername();

		Mage::log('***** SAVE ******');
        Mage::log('Modification date: ' . $modDate);
		Mage::log('Save Product ID: ' . $product->getId());
		Mage::log('Save Store ID: ' . $product->getStoreId());
		Mage::log('Save Editor: ' . $editor->getUsername() . ' ID: ' . $editor->getId());
		$jsonData = Mage::helper('core')->jsonEncode($product->getData());		
		Mage::log($jsonData);

		//database write adapter 
		//$write = Mage::getSingleton('example/event')->getConnection('core_write');
		//$writeMethods = get_class_methods(get_class($write));foreach($writeMethods as $r){echo $r."\n";}
		/*
		$write->insert("smtest_changelog", array("date" => $modDate,
											"store_id" => $storeID,
											"product_id" => $product->getId(),
											"before" => $jsonData,
											"username" => $editor)
		);*/

		$resource = Mage::getSingleton('core/resource');
    	$write = $resource->getConnection('core_write');
    	$table = $resource->getTableName('example/event');
		//$query = "INSERT INTO {$table} SET date = '$modDate', store_id='$storeID', product_id='$productID', before='1122', username='$username'";

		$query = "INSERT INTO  smtest_changelog VALUES (NULL ,  '$modDate',  '$storeID',  '$productID',  '$jsonData',  '$username')";

    	$write->query($query);

	}
}