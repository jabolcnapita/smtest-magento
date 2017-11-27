<?php
require_once 'Mage/Adminhtml/controllers/Catalog/ProductController.php';

class AlesW_Example_Adminhtml_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController
{


	public function indexAction() {
		Mage::log("ProductController indexAction");
		
		$logID = $this->getRequest()->getParam('id');
		if ($logID) {
			Mage::log("$logID = " . $logID);
		}		
		else
			Mage::log("logID JE FALSE" . $logID);

		// Following is original indexAction from Mage/Adminhtml/controllers/Catalog/ProductController.php

        $this->_title($this->__('Catalog'))
             ->_title($this->__('Manage Products'));

        $this->loadLayout();
        $this->renderLayout();		
	}


	/**
	 * Get product order gride and serializer block
	 */
	public function changelogAction()
	{
		Mage::log("ProductController changelogAction");
		$this->_initProduct();
		$this->loadLayout();
		$this->getLayout()->getBlock('catalog.product.edit.tab.changelog');
		$this->renderLayout();
	}

	/**
	 * Product order grid for AJAX request
	 */
	public function changeloggridAction()
	{
		Mage::log("ProductController changeloggridAction");
		$this->_initProduct();
		$this->loadLayout();
		$this->getLayout()->getBlock('catalog.product.edit.tab.changelog');
		$this->renderLayout();
	}
}