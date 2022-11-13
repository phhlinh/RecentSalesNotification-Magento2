<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Block\Adminhtml;

class Item extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_item';
        $this->_blockGroup = 'PL_Salenotice';
        $this->_headerText = __('Items');
        $this->_addButtonLabel = __('Add New Item');
        parent::_construct();
    }
}
