<?php

namespace DigitalCollege\Dev\Controller\Index;

use DigitalCollege\Dev\Model\DigitalFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $digitalFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        DigitalFactory                             $digitalFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->digitalFactory = $digitalFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $dc = $this->digitalFactory->create();
        $this->log('Passando Controler');
        $dc->setData([
                'author_name' => 'Eu111',
                'email' => 'email@eu.com.tu',
                'description' => 'Agora Vai Sem erro?!'
            ]
        );
        $dc->save();
        return $this->_pageFactory->create();
    }

    private function log($text){
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/index.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info($text);
    }

}
