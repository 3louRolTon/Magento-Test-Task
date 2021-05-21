<?php
namespace Modules\Banner\Model;

use Modules\Banner\Api\Data\BannerInterface;
use Modules\Banner\Api\Data\BannerSearchResultInterface;
use Modules\Banner\Api\Data\BannerSearchResultInterfaceFactory;
use Modules\Banner\Api\BannerRepositoryInterface;
use Modules\Banner\Model\ResourceModel\Banner as BannerResource;
use Modules\Banner\Model\ResourceModel\Banner\Collection as BannerCollection;
use Modules\Banner\Model\ResourceModel\Banner\CollectionFactory as BannerCollectionFactory;
use Modules\Banner\Model\BannerFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;

/**
 * Class PostRepository
 * @package Modules\Banner\Model
 */
class BannerRepository implements BannerRepositoryInterface
{
    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var BannerResource
     */
    private $bannerResource;

    /**
     * @var BannerFactory
     */
    private $bannerFactory;

    /**
     * @var BannerCollectionFactory
     */
    private $bannerCollectionFactory;

    /**
     * @var BannerSearchResultInterfaceFactory
     */
    private $bannerSearchResultFactory;

    /**
     * @param BannerResource $bannerResource
     * @param BannerFactory $bannerFactory
     * @param BannerCollectionFactory $bannerCollectionFactory
     * @param BannerSearchResultInterfaceFactory $bannerSearchResultFactory
     */
    public function __construct(
        BannerResource $bannerResource,
        BannerFactory $bannerFactory,
        BannerCollectionFactory $bannerCollectionFactory,
        BannerSearchResultInterfaceFactory $bannerSearchResultFactory
    ) {
        $this->bannerResource = $bannerResource;
        $this->bannerFactory = $bannerFactory;
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        $this->bannerSearchResultFactory = $bannerSearchResultFactory;
    }

    /**
     * @param int $id
     * @return BannerInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id)
    {
        if (!array_key_exists($id, $this->registry)) {
            $post = $this->bannerFactory->create();
            $this->bannerResource->load($post, $id);
            if (!$post->getId()) {
                throw new NoSuchEntityException(__('Requested banner does not exist'));
            }
            $this->registry[$id] = $post;
        }

        return $this->registry[$id];
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Modules\Banner\Api\Data\BannerSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var BannerCollection $collection */
        $collection = $this->bannerCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        /** @var BannerSearchResultInterface $searchResult */
        $searchResult = $this->bannerSearchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * @param \Modules\Banner\Api\Data\BannerInterface $banner
     * @return BannerInterface
     * @throws StateException
     */
    public function save(BannerInterface $banner)
    {
        try {
            /** @var Banner $banner */
            $this->bannerResource->save($banner);
            $this->registry[$banner->getId()] = $this->get($banner->getId());
        } catch (\Exception $exception) {
            throw new StateException(__('Unable to save banner #%1', $banner->getId()));
        }
        return $this->registry[$banner->getId()];
    }

    /**
     * @param \Modules\Banner\Api\Data\BannerInterface $banner
     * @return bool
     * @throws StateException
     */
    public function delete(BannerInterface $banner)
    {
        try {
            /** @var Banner $banner */
            $this->bannerResource->delete($banner);
            unset($this->registry[$banner->getId()]);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove banner #%1', $banner->getId()));
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id)
    {
        return $this->delete($this->get($id));
    }
}
