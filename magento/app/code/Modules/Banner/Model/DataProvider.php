<?php
namespace Modules\Banner\Model;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;
    /**
     * @var Banner
     */
    protected $bannerFactory;
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Modules\Banner\Model\BannerFactory $bannerFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Modules\Banner\Model\BannerFactory $bannerFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->bannerFactory = $bannerFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }

    public function getData()
    {
        return $this->bannerFactory->getCollection()->toArray();
    }
}
