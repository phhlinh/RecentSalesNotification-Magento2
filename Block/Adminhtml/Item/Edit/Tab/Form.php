<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Block\Adminhtml\Item\Edit\Tab;

class Form extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var
     */
    protected $_salenoticeHelper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('_current_salenotice');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        //$form->setHtmlIdPrefix('salenotice_');
        $form->setFieldNameSuffix('salenotice');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );
        if ($model->getId()) {
            $fieldset->addField(
                'item_id',
                'hidden',
                ['name' => 'item_id']
            );
        }
        $fieldset->addField(
            'product_id',
            'text',
            [
                'name'        => 'product_id',
                'label'    => __('Product Id'),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'shipping_address',
            'text',
            [
                'name'      => 'shipping_address',
                'label'     => __('Shipping Address'),
                'required'  => true
            ]
        );
        $fieldset->addField(
            'time_ago',
            'text',
            [
                'name'      => 'time_ago',
                'label'     => __('Time Ago'),
                'required'  => true
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Info');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Info');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}
