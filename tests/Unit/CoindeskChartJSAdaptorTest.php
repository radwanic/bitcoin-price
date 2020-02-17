<?php

namespace Tests\Unit;

use App\Adaptors\CoindeskChartJS;
use App\Charts\ChartJS;
use App\Services\Coindesk;
use PHPUnit\Framework\TestCase;

class CoindeskChartJSAdaptorTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function it_returns_convertible_class()
    {
        $coindeskService = new Coindesk();

        $chartjs = new ChartJS();

        $coindeskChartJS = new CoindeskChartJS();

        $formattedChartData = $coindeskChartJS->format($coindeskService, $chartjs);

        $this->assertInstanceOf('App\Charts\Convertible', $formattedChartData);
    }

    /**
     * @test
     * @return void
     */
    public function it_sets_chart_labels_and_datasets()
    {
        $coindeskService = new Coindesk();

        $chartjs = new ChartJS();

        $coindeskChartJS = new CoindeskChartJS();

        $formattedChartData = $coindeskChartJS->format($coindeskService, $chartjs);

        $this->assertIsArray($formattedChartData->toArray());
        $this->assertArrayHasKey('data', $formattedChartData->toArray());
        $this->assertArrayHasKey('labels', $formattedChartData->toArray()['data']);
        $this->assertArrayHasKey('datasets', $formattedChartData->toArray()['data']);
    }
}
