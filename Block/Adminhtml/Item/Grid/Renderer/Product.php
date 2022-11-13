<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Block\Adminhtml\Item\Grid\Renderer;

class Product extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $_productFactory;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
         parent::__construct($context);
        $this->_productFactory = $productFactory;
    }

    /**
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $product = $this->_productFactory->create()->load($row->getProductId());
        if ($product->getData('name')) {
            $name =  $product->getName();
        } else {
            $name =  $row->getProductId();
        }
        return $name;
    }
}
