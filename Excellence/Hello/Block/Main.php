<?php 
    
    namespace Excellence\Hello\Block;
    class Main extends \Magento\Framework\View\Element\Template
    {   
        protected $_logtestFactory;

        public function __construct(
            \Magento\Framework\View\Element\Template\Context $context,
            \Excellence\Hello\Model\LogtestFactory $logtestFactory,
            array $data = []
        )
        {   
            $this->_logtestFactory = $logtestFactory;
            parent::__construct($context, $data);
        }


        protected function _prepareLayout()
        {
            $this->pageConfig->getTitle()->set(__('Login Logout Data'));
            if ($this->getLogHistory()) {
                $pager = $this->getLayout()->createBlock(
                    'Magento\Theme\Block\Html\Pager',
                    'reward.history.pager'
                )->setAvailableLimit(array(5=>5,10=>10,15=>15,20=>20))
                    ->setShowPerPage(false)->setCollection(
                    $this->getLogHistory()
                );
                $this->setChild('pager', $pager);
                $this->getLogHistory()->load();
            }
            return $this;
        }

        public function getPagerHtml()
        {
            return $this->getChildHtml('pager');
        }

        public function getLogHistory()
        {
            $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
            $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest
            ()->getParam('limit') : 5;
           
            if(isset($_GET['TableSort']) || isset($_GET['email'])){

                if(!isset($_GET['TableSort'])){
                    $collection = $this->customerByEmail();
                }
                else{
                    $collection = $this->collectionsort();
                }
            }else{
                $collection = $this->_logtestFactory->create()->getCollection();
            }
            
            $collection->setPageSize($pageSize);
            $collection->setCurPage($page);
            return $collection;
        }

        public function customerByEmail()
        {    
            $Cusemail = $_GET['email'];
            $Cusemail = "%". $Cusemail."%";
            return $this->_logtestFactory->create()->getCollection()->addFieldToFilter("email", array('like' => "$Cusemail"));
        }
      
        public function collectionsort()
        {
            $Sortvar = $_GET['TableSort'];

            if(isset($_GET['email'])){
                $defaultcollect = $this->customerByEmail();
            }else{
                $defaultcollect = $this->_logtestFactory->create()->getCollection(); }

            if ($Sortvar == "Idasc" ){
                $collect = $defaultcollect->setOrder('logdata_id','ASC');
                return $collect;   
            }
            elseif ($Sortvar == "Iddesc" ){
                $collect = $defaultcollect->setOrder('logdata_id','DESC');
                return $collect;   
            } 
            elseif ($Sortvar == "Emailasc" ) {
                $collect = $defaultcollect->setOrder('email','ASC');  
                return $collect;   
            } 
            elseif ($Sortvar == "Emaildesc" ) {
                $collect = $defaultcollect->setOrder('email','DESC');
                return $collect;   
            } 
            elseif ($Sortvar == "Inasc" ) {
                $collect = $defaultcollect->setOrder('login','ASC');  
                return $collect;   
            } 
            elseif ($Sortvar == "Indesc" ) {
                $collect = $defaultcollect->setOrder('login','DESC');
                return $collect;   
            } 
            elseif ($Sortvar == "Outasc" ) {
                $collect = $defaultcollect->setOrder('logout','ASC');  
                return $collect;   
            } 
            else{
                $collect = $defaultcollect->setOrder('logout','DESC');
                return $collect;   
            } 
        }

    }