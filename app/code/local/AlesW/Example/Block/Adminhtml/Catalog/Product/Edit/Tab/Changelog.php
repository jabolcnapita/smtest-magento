<?php

class AlesW_Example_Block_Adminhtml_Catalog_Product_Edit_Tab_Changelog extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
        parent::__construct();
        Mage::log('AlesW_Example_Block_Adminhtml_Catalog_Product_Edit_Tab_Changelog');
        $this->setUseAjax(true);
        $this->setId('changeloggrid');
        $this->setDefaultSort('date');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
	}

	/**
	 * Get the current product
	 *
	 * @return mixed Mage_Catalog_Model_Product
	 *
	 */
	protected function _getProduct()
	{
		return Mage::registry('current_product');
	}

	/**
	 * Prepare grid collection object
	 *
	 * @return $this|Mage_Adminhtml_Block_Widget_Grid
	 */
    public function _prepareCollection()
    {
        $product = $this->_getProduct();
        $editor  = Mage::getSingleton('admin/session')->getUser();

		Mage::log('Product ID: ' . $this->_getProduct()->getId());
		Mage::log('Store ID: ' . $this->_getProduct()->getStoreId());
		Mage::log('Editor: ' . $editor->getUsername() . ' ID: ' . $editor->getId());


		try {
			$collection = Mage::getModel('example/event')->getCollection()
				->addFieldToFilter('product_id', $product->getId())
				->addFieldToFilter('store_id', $product->getStoreId());
			//$collection = Mage::getResourceModel('example/event');
		} catch (Exception $e) {
			Mage::log('Caught exception: ' . $e->getMessage());
		    //echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

		if (empty($collection))
			Mage::log('$collection is empty!');
		else
		  Mage::log('$collection NI empty');    // $collection->getSelect()    

        
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }


	/**
	 * Prepare the grid columns
	 *
	 * @return mixed $this|void
	 *
	 */
    protected function _prepareColumns()
    {
        $this->addColumn('date', array(
            'type' => 'date',
            'index' => 'date',
            'header' => $this->__('Date'),
            //'filter_index' => 'date'
        ));

        $this->addColumn('store_id', array(
            'type' => 'text',
            'index' => 'store_id',
            'header' => $this->__('Store ID')
        ));

        $this->addColumn('product_id', array(
            'type' => 'text',
            'index' => 'product_id',
            'header' => $this->__('Product ID')
        ));


        $this->addColumn('before', array(
            'type' => 'text',
            'index' => 'before',
            'header' => $this->__('Before change')
        ));

        $this->addColumn('username', array(
            'type' => 'text',
            'index' => 'username',
            'header' => $this->__('Username'),
            'sort_index' => 'username'
        ));        

        return parent::_prepareColumns();
    }
   

	/**
	 * @return mixed|string
	 */
	public function getGridUrl()
	{
		return $this->_getData('grid_url')
			? $this->_getData('grid_url')
			: $this->getUrl('*/*/changeloggrid', array('_current' => true));
	}


	/**
	 * @param $item
	 *
	 * @return bool|string
	 */
	public function getRowUrl($item)
	{
		return false;
	}



	/**
	* Save (log) product modification
	* 
	* @param Mage_Catalog_Model_Product $product
	* @return AlesW_Example_Model_Product_Edit_Tab_Changelog
	*/
	public function save($product = null) {
		$modDate = date("Y-m-d H:m:s");

		// collect current product data
        $product = $this->_getProduct();
        $productData = $product->getData();
        $editor  = Mage::getSingleton('admin/session')->getUser();

		Mage::log('***** SAVE ******');
        Mage::log('Modification date: ' . $modDate);
		Mage::log('Save Product ID: ' . $this->_getProduct()->getId());
		Mage::log('Save Store ID: ' . $this->_getProduct()->getStoreId());
		Mage::log('Save Editor: ' . $editor->getUsername() . ' ID: ' . $editor->getId());
		Mage::log('Product data: ' . $productData);



		parent::save($product);

		

	}
}