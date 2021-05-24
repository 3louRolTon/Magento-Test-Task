<?php
namespace Modules\Banner\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Modules\Banner\Model\Banner;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;

class Save extends Action
{

    protected $_bannerFactory;
    protected $resultPageFactory;
    protected $_sessionManager;

    public function __construct(
        Context $context,
        BannerFactory $bannerFactory,
        PageFactory  $resultPageFactory,
        SessionManagerInterface $sessionManager
    )
    {
        parent::__construct($context);
        $this->_bannerFactory = $bannerFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $BannerModel = $this->_bannerFactory->create();
        $data = $this->getRequest()->getPost();

        $BannerModel->setData('banner_name', $data['banner_name']);
        $BannerModel->setData('banner_text', $data['banner_text']);
        $BannerModel->setData('banner_popel', $data['banner_popel']);
        $BannerModel->setData('banner_one_show', $data['banner_one_show']);
        $BannerModel->setData('banner_start_day', $data['banner_start_day']);
        $BannerModel->setData('banner_start_day', $data['banner_start_day']);

        $BannerModel->save();

        $this->_redirect('banner/index/index');
        $this->messageManager->addSuccess(__('The data has been saved.'));
    }
}
