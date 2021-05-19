<?php
namespace Modules\Banner\Model;

class Data
    extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    public function __construct(
        $name,
        \Magento\Framework\Api\Search\ReportingInterface $reporting,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\UrlInterface $url
    ) {
        $primaryFieldName = 'id';
        $requestFieldName = 'id';
        $meta = [];
        $updateUrl = $url->getRouteUrl('mui/index/render');
        $data = [
            'config' => [
                'component' => 'Magento_Ui/js/grid/provider',
                'update_url' => $updateUrl
            ]
        ];
        parent::__construct($name, $primaryFieldName, $requestFieldName, $reporting, $searchCriteriaBuilder, $request,
            $filterBuilder, $meta, $data);
    }

    public function getData()
    {
        /*$result = [
            'data' => [
                ['code2' => 'AU', 'code3' => 'AUS', 'code_num' => '036'],
                ['code2' => 'AT', 'code3' => 'AUT', 'code_num' => '040'],
                ['code2' => 'AZ', 'code3' => 'AZE', 'code_num' => '031']
            ],
            'totalRecords' => 3
        ];*/

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $sql = "SELECT * FROM banners";
        $result = $connection->fetchAll($sql);

        return $result;
    }

}
