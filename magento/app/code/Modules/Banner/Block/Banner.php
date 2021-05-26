<?php
namespace Modules\Banner\Block;
use Magento\Framework\View\Element\Template;
use Modules\Banner\Model\Dummy;

class Banner extends \Magento\Framework\View\Element\Template
{
    const XML_PATH_EMAIL_RECIPIENT = 'banner_section/banner_group/banner_one_show';

    protected $scopeConfig;

    protected $dummy;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Dummy $dummy,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->dummy = $dummy;
        parent::__construct($context);
    }

    public function getSettingsBanner()
    {

        return $this->dummy->getSettings();

    }
}
