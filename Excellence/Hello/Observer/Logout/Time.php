<?php
 
 
namespace Excellence\Hello\Observer\Logout;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Excellence\Hello\Model\LogtestFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
 
 
class Time implements ObserverInterface
{
    protected $_date;
    protected $logger;
    protected $_logtestFactory;
 
   
    public function __construct(LoggerInterface $logger, LogtestFactory $logtestFactory, DateTime $date)
    {
        $this->logger = $logger;
        $this->_date = $date;
        $this->_logtestFactory = $logtestFactory;
    }
 
    public function execute(Observer $observer)
    {
        $date = $this->_date->gmtDate();
        $logdata=$this->_logtestFactory->create()->getCollection()->getData();
        $col = array_reverse($logdata);
        $lastID = $col[0]['logdata_id'];
        $collections = $this->_logtestFactory->create()->getCollection()->addFieldToFilter('logdata_id', array('eq' => $lastID));
        foreach($collections as $item)
        {
            $item->setLogout( $date);
        }
        $collections->save();
    }
}

