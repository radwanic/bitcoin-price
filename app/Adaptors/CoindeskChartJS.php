<?php

namespace App\Adaptors;

use App\Charts\Chart;
use App\Charts\Convertible;
use App\Services\PriceProviderInterface;

class CoindeskChartJS implements AdaptorInterface
{
    public function format(PriceProviderInterface $pricesProvider, Chart $chart): Convertible
    {
        $prices = $pricesProvider->prices();

        $chartData = $chart->getAttributes();

        $chartData['data']['labels'] = array_keys($prices);

        $chartData['data']['datasets'] = [
            [
                'label' => '',
                'data' => array_values($prices)
            ]
        ];

        $chart->setAttributes($chartData);

        return $chart;
    }
}