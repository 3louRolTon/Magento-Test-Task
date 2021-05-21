<?php
namespace Modules\Banner\Api\Data;

/**
 * Interface BannerInterface
 * @package Modules\Api\Data
 * @api
 */
interface BannerInterface
{
    /**#@+
     * Constants
     * @var string
     */
    const ID = 'banner_id';
    const Title = 'banner_name';
    const Text = 'banner_text';
    const Popel = 'banner_popel';
    const One_show = 'banner_one_show';
    const Start_day = 'banner_start_day';
    const End_day = 'banner_end_day';
    /**#@-*/

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text);

    /**
     * @return string
     */
    public function getPopel();

    /**
     * @param string $popel
     * @return $this
     */
    public function setPopel(string $popel);

    /**
     * @return bool
     */
    public function getOneShow();

    /**
     * @param bool $oneShow
     * @return $this
     */
    public function setOneShow(string $oneShow);

    /**
     * @return string
     */
    public function getStartDay();

    /**
     * @param string $startDay
     * @return $this
     */
    public function setStartDay(string $startDay);

    /**
     * @return string
     */
    public function getEndDay();

    /**
     * @param string $endDay
     * @return $this
     */
    public function setEndDay(string $endDay);
}
