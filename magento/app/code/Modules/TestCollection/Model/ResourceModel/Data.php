<?php

namespace Modules\TestCollection\Model\ResourceModel;


use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('modules_testcollection_table', 'id'); //id is a primary key
    }
}
