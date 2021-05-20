<?php
namespace Modules\TestCollection\Model\ResourceModel\Data;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Modules\TestCollection\Model\Data',
            'Modules\TestCollection\Model\ResourceModel\Data'
        );
    }
}
