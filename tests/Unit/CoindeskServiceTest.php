<?php

namespace Tests\Unit;

use App\Services\Coindesk;
use PHPUnit\Framework\TestCase;

class CoindeskServiceTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function it_throws_exception_if_url_is_not_set()
    {
        $coindesk = new Coindesk();

        $coindesk->setUrl(null);

        $this->expectException('\Exception');
        $this->expectExceptionMessage('Service URL is not set.');

        $coindesk->prices();
    }

    /**
     * @test
     * @return void
     */
    public function it_throws_exception_on_service_communication_failure()
    {
        $coindesk = new Coindesk();

        $coindesk->setUrl('wrong-url');

        $this->expectException('\Exception');
        $this->expectExceptionMessage('Something went wrong while fetching data from service.');

        $coindesk->prices();
    }

    /**
     * @test
     * @return void
     */
    public function it_communicates_with_the_service_and_return_prices()
    {
        $coindesk = new Coindesk();

        $this->assertIsArray($coindesk->prices());
    }

    /**
     * @test
     * @return void
     */
    public function it_filters_by_date()
    {
        $coindesk1 = new Coindesk();
        $coindesk1->range(now()->subDay()->toDateString(), now()->toDateString());

        $coindesk2 = new Coindesk();

        $this->assertGreaterThan(count($coindesk1->prices()), count($coindesk2->prices()));
    }
}
