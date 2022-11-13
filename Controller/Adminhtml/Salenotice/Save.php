<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Controller\Adminhtml\Salenotice;

class Save extends \PL\Salenotice\Controller\Adminhtml\Salenotice
{

    public function execute()
    {
        // TODO: Implement execute() method.

        $post = $this->getRequest()->getPost();
        if ($post) {
            $model = $this->_salenoticeFactory->create();
            $item_id = $this->getRequest()->getParam('item_id');

            if ($item_id) {
                $model->load($item_id);
            }
            $formData = $this->getRequest()->getParam('salenotice');
            $model->setData($formData);

            try {
                // Save news
                $model->save();

                // Display success message
                $this->messageManager->addSuccess(__('The item has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['item_id' => $model->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['item_id' => $item_id]);
        }
    }
}

