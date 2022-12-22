<?php
declare(strict_types=1);
namespace DigitalCollege\HelloWorld\Controller\Index;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
class Index implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }
    public function execute()
    {
        $text = 'Hello World! É nos que voa Bruxão';
        $response = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $response->setContents($text);
        return $response;

    }
}
