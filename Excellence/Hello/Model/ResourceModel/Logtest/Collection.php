<?php
namespace Excellence\Hello\Model\ResourceModel\Logtest; 

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Excellence\Hello\Model\Logtest::class, \Excellence\Hello\Model\ResourceModel\Logtest::class); 
    }
}
