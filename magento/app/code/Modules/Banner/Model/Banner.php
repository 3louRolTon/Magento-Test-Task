<?php
namespace Modules\Banner\Model;

use Magento\Framework\Model\AbstractModel;

    class Banner extends AbstractModel
    {
        protected function _construct()
        {
            $this->_init('Modules\Banner\Model\ResourceModel\Banner');
        }
    }
