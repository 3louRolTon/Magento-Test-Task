<?php
namespace Flancer32\Sample\Model;

use Magento\Framework\Model\AbstractModel;

    class Data extends AbstractModel
    {
        protected function _construct()
        {
            $this->_init('Flancer32\Sample\Model\ResourceModel\Data');
        }
    }
