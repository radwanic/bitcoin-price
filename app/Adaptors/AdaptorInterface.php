<?php

namespace App\Adaptors;

use App\Charts\Chart;
use App\Charts\Convertible;
use App\Services\PriceProviderInterface;

Interface AdaptorInterface
{
    public function format(PriceProviderInterface $pricesProvider, Chart $chart): Convertible;
}