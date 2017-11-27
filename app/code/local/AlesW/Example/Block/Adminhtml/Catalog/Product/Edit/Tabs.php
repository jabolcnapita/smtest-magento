<?php

class AlesW_Example_Block_Adminhtml_Catalog_Product_Edit_Tabs extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs
{
	/**
	 * @var
	 */
	private $parent;

	/**
	 * @return mixed Mage_Core_Block_Abstract
	 */
	protected function _prepareLayout()
	{
		// get all existing tabs
		$this->parent = parent::_prepareLayout();

		// add new tab
		$this->addTab('changelog', array(
			'label'   => Mage::helper('catalog')->__('Changelog'),
			'content' => $this->getLayout()->createBlock('example/adminhtml_catalog_product_edit_tab_changelog')->toHtml(),
		));

		return $this->parent;
	}
}