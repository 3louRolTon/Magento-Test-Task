<?php
namespace Modules\Banner\Api;

use Modules\Banner\Api\Data\BannerInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface PostRepositoryInterface
 * @package Modules\Api
 * @api
 */
interface BannerRepositoryInterface
{
    /**
     * @param int $id
     * @return \Modules\Banner\Api\Data\BannerInterface
     */
    public function get(int $id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Modules\Banner\Api\Data\BannerSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \Modules\Banner\Api\Data\BannerInterface $banner
     * @return \Modules\Banner\Api\Data\BannerInterface
     */
    public function save(BannerInterface $banner);

    /**
     * @param \Modules\Banner\Api\Data\BannerInterface $post
     * @return bool
     */
    public function delete(BannerInterface $banner);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id);
}
