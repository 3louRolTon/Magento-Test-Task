<?php
namespace Modules\TestCollection\Block;


use Magento\Framework\View\Element\Template\Context;
use Modules\TestCollection\Model\Data;
use Magento\Framework\View\Element\Template;


class Index extends Template
{

    /**
     * @var Data
     */
    protected $model;
    protected $dataFactory;

    public function __construct(Context $context,
                                \Modules\TestCollection\Model\DataFactory $dataFactory,
                                array $data = array())
    {
        $this->dataFactory = $dataFactory;
        parent::__construct($context, $data);

    }

    public function getCollection(){

        return $this->dataFactory->create()->getCollection()->getData();

    }
}
