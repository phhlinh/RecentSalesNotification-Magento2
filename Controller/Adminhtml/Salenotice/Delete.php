<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Controller\Adminhtml\Salenotice;

class Delete extends \PL\Salenotice\Controller\Adminhtml\Salenotice
{

    public function execute()
    {
        // TODO: Implement execute() method.
        $item_id = (int) $this->getRequest()->getParam('item_id');

        if ($item_id) {
            $model = $this->_salenoticeFactory->create();
            $model->load($item_id);

            // Check this news exists or not
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
            } else {
                try {
                    $model->delete();
                    $this->messageManager->addSuccess(__('The item has been deleted.'));
                    // Redirect to grid page
                    $this->_redirect('*/*/');
                    return;
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['item_id' => $model->getId()]);
                }
            }
        }
    }
}
