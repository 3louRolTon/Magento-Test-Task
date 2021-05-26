<?php
namespace Modules\Banner\Block;
use Magento\Framework\View\Element\Template;
use Modules\Banner\Model\BannerConfig;

class Banner extends \Magento\Framework\View\Element\Template
{
    const XML_PATH_EMAIL_RECIPIENT = 'banner_section/banner_group/banner_one_show';

    protected $scopeConfig;

    protected $bannerConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        BannerConfig $bannerConfig,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->bannerConfig = $bannerConfig;
        parent::__construct($context);
    }

    public function getSettingsBanner()
    {

        return $this->bannerConfig->getSettings();

    }
}
