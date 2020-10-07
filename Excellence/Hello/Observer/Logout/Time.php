<?php
 
 
namespace Excellence\Hello\Observer\Logout;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Excellence\Hello\Model\LogtestFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Customer\Model\SessionFactory;
 
 
 
class Time implements ObserverInterface
{
    protected $_date;
    protected $logger;
    protected $_logtestFactory;
    protected $_customerSession;
 
   
    public function __construct(LoggerInterface $logger, LogtestFactory $logtestFactory, DateTime $date, SessionFactory $customerSession)
    {
        $this->logger = $logger;
        $this->_date = $date;
        $this->_logtestFactory = $logtestFactory;
        $this->_customerSession = $customerSession->create();
    }
 
    public function execute(Observer $observer) 
    {   
        $custmail = $this->_customerSession->getCustomerData()->getEmail();
        $date = $this->_date->gmtDate();
        $collections = $this->_logtestFactory->create()->getCollection()->addFieldToFilter('email', $custmail)->addFieldToFilter('logout', array('null' => true));
        $data = $collections->getFirstItem();
        $data->setLogout( $date);
        $collections->save();
    }
}

