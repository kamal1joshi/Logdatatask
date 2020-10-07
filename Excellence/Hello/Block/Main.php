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
                    ->setShowPerPage(true)->setCollection(
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

        Public function getLogHistory()
        {
            $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
            $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest
            ()->getParam('limit') : 5;
            
            $collection = $this->_logtestFactory->create()->getCollection();
            $collection->setPageSize($pageSize);
            $collection->setCurPage($page);
            return $collection;
        }
    }



