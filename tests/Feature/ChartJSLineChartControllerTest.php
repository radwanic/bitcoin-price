<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChartJSLineChartControllerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function it_validates_filter_date_format()
    {
        $response = $this->getJson('/api/chartjs/line?from=123&to[0]=1234');
        $response->assertStatus(422);
        $errors = $response->decodeResponseJson('errors');

        $this->assertArrayHasKey('from', $errors);
        $this->assertStringContainsStringIgnoringCase('from does not match the format Y-m-d', implode(',', $errors['from']));
        $this->assertArrayHasKey('to', $errors);
        $this->assertStringContainsStringIgnoringCase('to does not match the format Y-m-d', implode(',', $errors['to']));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_throws_an_exception_if_from_is_after_to()
    {
        $response = $this->getJson('/api/chartjs/line?from=2020-02-15&to=2020-02-10');
        $response->assertStatus(422);
        $errors = $response->decodeResponseJson('errors');

        $this->assertArrayHasKey('to', $errors);
        $this->assertStringContainsStringIgnoringCase('to must be a date after from', implode(',', $errors['to']));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_returns_valid_chartjs_line_chart_data_format()
    {
        $response = $this->getJson('/api/chartjs/line?from=2020-02-15&to=2020-02-20');
        $response->assertStatus(200);
        $data = $response->decodeResponseJson();

        $this->assertArrayHasKey('type', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('labels', $data['data']);
        $this->assertArrayHasKey('datasets', $data['data']);
    }
}
