<?php
namespace Excellence\Hello\Model;

class Logtest extends \Magento\Framework\Model\AbstractModel implements
    \Excellence\Hello\Api\Data\TestInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'logdata';

    protected function _construct() 
    {
        $this->_init(\Excellence\Hello\Model\ResourceModel\Logtest::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function loadByLogdataId($logdataid){
        if(!$logdataid){
            $logdataid = $this->getLogdataId();
        }
        $id = $this->getResource()->loadByLogdataId($logdataid);
        return $this->load($id);
    }
}
