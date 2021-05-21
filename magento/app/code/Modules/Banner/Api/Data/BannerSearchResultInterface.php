<?php
namespace Modules\Banner\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface BannerSearchResultInterface
 * @package Modules\Banner\Api\Data
 */
interface BannerSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Modules\Banner\Api\Data\BannerInterface[]
     */
    public function getItems();

    /**
     * @param \Modules\Banner\Api\Data\BannerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
