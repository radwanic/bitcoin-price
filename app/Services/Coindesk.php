<?php

namespace App\Services;

class Coindesk extends PricesServiceProvider
{
    /**
     * Coindesk constructor.
     */
    function __construct()
    {
        $this->url = "https://api.coindesk.com/v1/bpi/historical/close.json";
    }

    /**
     * @param $from
     * @param $to
     */
    public function range($from, $to)
    {
        $this->url .= "?start=$from&end=$to";

    }

    /**
     * @param $json
     * @return array
     */
    protected function extractPricesFromJson($json): array
    {
        return (array)json_decode($json, true)['bpi'];
    }
}