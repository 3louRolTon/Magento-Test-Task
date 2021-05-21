<?php
namespace Modules\Banner\Model;

use Modules\Banner\Api\Data\BannerInterface;
use Modules\Banner\Model\ResourceModel\Banner as BannerResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Banner
 * @package Modules\Banner\Model
 */
class Banner extends AbstractModel implements BannerInterface
{
    /**
     * @var string
     */
    protected $_idFieldName = BannerInterface::ID; //@codingStandardsIgnoreLine

    /**
     * @inheritdoc
     */
    protected function _construct() //@codingStandardsIgnoreLine
    {
        $this->_init(BannerResource::class);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(BannerInterface::Title);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setData(BannerInterface::Title, $title);
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getData(BannerInterface::Text);
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->setData(BannerInterface::Text, $text);
        return $this;
    }

    /**
     * @return string
     */
    public function getPopel()
    {
        return $this->getData(BannerInterface::Popel);
    }

    /**
     * @param string $popel
     * @return $this
     */
    public function setPopel(string $popel)
    {
        $this->setData(BannerInterface::Popel, $popel);
        return $this;
    }

    /**
     * @return bool
     */
    public function getOneShow()
    {
        return $this->getData(BannerInterface::One_show);
    }

    /**
     * @param string $oneShow
     * @return $this
     */
    public function setOneShow(string $oneShow)
    {
        $this->setData(BannerInterface::One_show, $oneShow);
        return $this;
    }

    /**
     * @return string
     */
    public function getStartDay()
    {
        return $this->getData(BannerInterface::Start_day);
    }

    /**
     * @param string $startDay
     * @return $this
     */
    public function setStartDay(string $startDay)
    {
        $this->setData(BannerInterface::Start_day, $startDay);
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDay()
    {
        return $this->getData(BannerInterface::End_day);
    }

    /**
     * @param string $endDay
     * @return $this
     */
    public function setEndDay(string $endDay)
    {
        $this->setData(BannerInterface::End_day, $endDay);
        return $this;
    }
}
