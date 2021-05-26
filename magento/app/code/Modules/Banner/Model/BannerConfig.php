<?php
namespace Modules\Banner\Model;

class BannerConfig
    {
    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;

    /**
    * Recipient email config path
    */
        const XML_PATH_CONFIG = 'banner_section/banner_group/banner_one_show';

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
    * Sample function returning config value
    **/

    public function getSettings() {
    $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

    return $this->scopeConfig->getValue(self::XML_PATH_CONFIG, $storeScope);


    }
}
