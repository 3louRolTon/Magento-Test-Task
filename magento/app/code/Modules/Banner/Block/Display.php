<?php
namespace Modules\Banner\Block;

use Magento\Framework\View\Element\Template\Context;
use Modules\Banner\Model\Banner;
use Magento\Framework\View\Element\Template;

class Display extends Template
{

    protected $bannerFactory;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Modules\Banner\Model\BannerFactory $bannerFactory, $data = [])
    {

        $this->bannerFactory = $bannerFactory;
        parent::__construct($context, $data);

    }

    public function getCollection()
    {
        /*$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $sql = "SELECT * FROM banners";
        $result = $connection->fetchAll($sql);*/

        $banner = $this->bannerFactory->create();
        $result = $banner->getCollection()->getData();
        return $result;
    }
}
