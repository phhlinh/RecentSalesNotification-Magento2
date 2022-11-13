<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Controller\Adminhtml\Salenotice;

class Edit extends \PL\Salenotice\Controller\Adminhtml\Salenotice
{

    public function execute()
    {
        $item_id = $this->getRequest()->getParam('item_id');

        $model = $this->_salenoticeFactory->create();

        if ($item_id) {
            $model->load($item_id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getSalenoticeData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('_current_salenotice', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('PL_Salenotice::salenotice');
        $resultPage->getConfig()->getTitle()->prepend(__('Sale Notice'));

        return $resultPage;
    }
}
