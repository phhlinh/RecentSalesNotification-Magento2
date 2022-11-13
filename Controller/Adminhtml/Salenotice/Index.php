<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Controller\Adminhtml\Salenotice;

class Index extends \PL\Salenotice\Controller\Adminhtml\Salenotice
{

    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('PL_Salenotice::salenotice');
        $resultPage->getConfig()->getTitle()->prepend(__('Sale Notices'));

        return $resultPage;
    }
}
