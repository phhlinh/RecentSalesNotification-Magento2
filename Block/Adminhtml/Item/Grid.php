<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Block\Adminhtml\Item;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \PL\Salenotice\Model\Resource\Item\CollectionFactory
     */
    protected $_itemCollectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \PL\Salenotice\Model\Resource\Item\CollectionFactory $itemCollectionFactory
     * @param \PL\Salenotice\Helper\Data $salenoticeHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \PL\Salenotice\Model\Resource\Item\CollectionFactory $itemCollectionFactory,
        \PL\Salenotice\Helper\Data $salenoticeHelper,
        array $data = []
    ) {
        $this->_itemCollectionFactory = $itemCollectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('salenoticeGrid');
        $this->setDefaultSort('item_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_itemCollectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'item_id',
            [
                'header' => __('#ID'),
                //'type' => 'number',
                'index' => 'item_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
                'filter' => false,
                'sortable' => false
            ]
        );
        $this->addColumn(
            'product_id',
            [
                'header' => __('Porduct Name'),
                //'index' => 'product_id',
                'renderer' => 'PL\Salenotice\Block\Adminhtml\Item\Grid\Renderer\Product',
                'filter' => false,
                'sortable' => false
            ]
        );

        $this->addColumn(
            'time_ago',
            [
                'header' => __('Time Ago'),
                'index' => 'time_ago',
                'filter' => false,
                'sortable' => false
            ]
        );

        $this->addColumn(
            'shipping_address',
            [
                'header' => __('Shipping Address'),
                'index' => 'shipping_address',
                'filter' => false,
                'sortable' => false
            ]
        );


        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit',
                        ],
                        'field' => 'item_id',
                    ],
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

    /**
     * get row url
     * @param  object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            '*/*/edit',
            array('item_id' => $row->getId())
        );
    }
}
