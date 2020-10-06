<?php
namespace Excellence\Hello\Model;

class Test extends \Magento\Framework\Model\AbstractModel implements
    \Excellence\Hello\Api\Data\TestInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_hello_test';
    protected function _construct() 
    {
        $this->_init(\Excellence\Hello\Model\ResourceModel\Test::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function loadByTitle($title){
        if(!$title){
            $title = $this->getTitle();
        }
        $id = $this->getResource()->loadByTitle($title);
        return $this->load($id);
    }
}
