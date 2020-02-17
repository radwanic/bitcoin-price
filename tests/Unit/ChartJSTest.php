<?php

namespace Tests\Unit;

use App\Charts\ChartJS;
use PHPUnit\Framework\TestCase;

class ChartJSTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function it_sets_and_gets_attributes()
    {
        $chart = new ChartJS();

        $chart->setAttribute('attr', 123);

        $this->assertIsArray($chart->getAttributes());
        $this->assertArrayHasKey('attr', $chart->getAttributes());
        $this->assertEquals(123, $chart->getAttribute('attr'));
    }

    /**
     * @test
     * @return void
     */
    public function it_returns_data()
    {
        $chart = new ChartJS();

        $this->assertIsArray($chart->data());
        $this->assertArrayHasKey('type', $chart->data());
        $this->assertArrayHasKey('data', $chart->data());
    }

}
