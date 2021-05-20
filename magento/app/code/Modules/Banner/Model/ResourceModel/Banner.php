<?php

namespace Modules\Banner\Model\ResourceModel;


use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Banner extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('modules_banner_banners', 'banner_id'); //id is a primary key
    }
}
