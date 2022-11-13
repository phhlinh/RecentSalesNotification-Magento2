<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Salenotice\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    public function __construct(
        \Magento\Framework\App\Helper\Context $context

    ) {
        parent::__construct($context);
    }

    public function getConfig($xml_path)
    {
        return $this->scopeConfig->getValue($xml_path);
    }


    public function getOrderLimit()
    {
        $limit = 5;
        if ($this->getConfig('salenotice/advance_settings/order_limit')) {
            $limit =  $this->getConfig('salenotice/advance_settings/order_limit');
        }
        return $limit;
    }

    public function getFirstTime()
    {
        $time = 5000;
        if ($this->getConfig('salenotice/advance_settings/first_time')) {
            $time =  1000*$this->getConfig('salenotice/advance_settings/first_time');
        }
        return $time;
    }

    public function getDelayTime()
    {
        $time = 10000;
        if ($this->getConfig('salenotice/advance_settings/delay_time')) {
            $time =  1000*$this->getConfig('salenotice/advance_settings/delay_time');
        }
        return $time;
    }

    public function getDisplayTime()
    {
        $time = 5000;
        if ($this->getConfig('salenotice/advance_settings/display_time')) {
            $time =  1000*$this->getConfig('salenotice/advance_settings/display_time');
        }
        return $time;
    }

    public function getSalenoticeCookieLifetime()
    {
        $day = 1;
        if ($this->getConfig('salenotice/advance_settings/cookie_lifetime')) {
            $day =  $this->getConfig('salenotice/advance_settings/cookie_lifetime')/24;
        }
        return $day;
    }
    /**
     * @return int
     */
    public function isMobile()
    {
        return preg_match(
            "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
            $_SERVER["HTTP_USER_AGENT"]
        );
    }
}
