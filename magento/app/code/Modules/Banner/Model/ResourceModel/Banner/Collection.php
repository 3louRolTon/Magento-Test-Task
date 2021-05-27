<?php
namespace Modules\Banner\Model\ResourceModel\Banner;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Modules\Banner\Model\Banner;
use Modules\Banner\Model\ResourceModel\Banner as BannerResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'banner_id';

    protected function _construct()
    {
        $this->_init(Banner::class,BannerResource::class);
    }
}
