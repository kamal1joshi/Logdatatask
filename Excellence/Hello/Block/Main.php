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
            $logdata=$this->_logtestFactory->create()->getCollection()->getData();
            $this->setText($logdata);
        }
    }