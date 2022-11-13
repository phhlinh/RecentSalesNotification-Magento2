<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Controller\Adminhtml\Salenotice;

class NewAction extends \PL\Salenotice\Controller\Adminhtml\Salenotice
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
