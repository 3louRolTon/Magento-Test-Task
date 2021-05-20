<?php
namespace Modules\TestCollection\Model;

use Magento\Framework\Model\AbstractModel;

    class Data extends AbstractModel
    {
        protected function _construct()
        {
            $this->_init('Modules\TestCollection\Model\ResourceModel\Data');
        }
    }
