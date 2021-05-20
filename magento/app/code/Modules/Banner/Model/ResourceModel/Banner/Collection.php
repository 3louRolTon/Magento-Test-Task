<?php
namespace Modules\Banner\Model\ResourceModel\Banner;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Modules\Banner\Model\Banner',
            'Modules\Banner\Model\ResourceModel\Banner'
        );
    }
}
