<?php /**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Modules\Banner\Controller\Banner;
use Modules\Banner\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    protected $collectionFactory;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $date;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        BannerCollectionFactory $collectionFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date
    )
    {
        $this->date = $date;
        $this->collectionFactory = $collectionFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
    /**
     * View  page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $collection = $this->collectionFactory->create();
        $data = $collection->addFieldToFilter('banner_start_day', ['lteq' => $this->date->date()->format('Y-m-d H:i:s')])
            ->addFieldToFilter('banner_end_day', ['gteq' => $this->date->date()->format('Y-m-d H:i:s')])->load();

        return $result->setData($data->getData());
    }
}
