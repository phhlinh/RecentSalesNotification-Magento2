<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        $this->_init('PL\Salenotice\Model\Resource\Item');
    }
}
