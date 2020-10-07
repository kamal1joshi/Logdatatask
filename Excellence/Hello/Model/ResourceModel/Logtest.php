<?php
namespace Excellence\Hello\Model\ResourceModel;

class Logtest extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct() 
    {
        $this->_init('logdata', 'logdata_id');
    }
    public function loadByLogdataId($logdataid){
        $table = $this->getMainTable();
        $where = $this->getConnection()->quoteInto("logdata_id = ?", $logdataid);
        $sql = $this->getConnection()->select()->from($table,array('logdata_id'))->where($where);
        $id = $this->getConnection()->fetchOne($sql);
        return $id;
    }
}
