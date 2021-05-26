<?php
namespace Modules\Banner\Block;
use Magento\Framework\View\Element\Template;

class Banner extends \Magento\Framework\View\Element\Template
{
    const XML_PATH_EMAIL_RECIPIENT = 'banner_section/banner_group/banner_one_show';

    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }

    public function getSettingsBanner()
    {

        return $this->scopeConfig->getValue(self::XML_PATH_EMAIL_RECIPIENT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    }
}
