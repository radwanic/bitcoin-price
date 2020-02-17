<?php

namespace App\Services;

/**
 * Class PricesServiceProvider
 * @package App\Services
 */
abstract class PricesServiceProvider implements PriceProviderInterface
{
    /**
     * @var
     */
    protected $url;

    /**
     * @param mixed $url
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function prices(): array
    {
        if (!$this->url) {
            throw new \Exception('Service URL is not set.');
        }

        return $this->extractPricesFromJson($this->fetchJson());
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    protected function fetchJson(): string
    {
        try {
            return file_get_contents($this->url);
        } catch (\Exception $exception) {
            throw new \Exception('Something went wrong while fetching data from service.');
        }
    }

    /**
     * @param $json
     * @return array
     */
    abstract protected function extractPricesFromJson($json): array;
}