<?php
namespace Modules\Banner\Block;

use Magento\Framework\View\Element\Template;
use Modules\Banner\Model\Data;

class Display extends Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, Data $model)
    {
        $this->model = $model;
        parent::__construct($context);
    }

    public function getDatas()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $sql = "SELECT * FROM banners";
        $result = $connection->fetchAll($sql);
        return $result;
    }
}
