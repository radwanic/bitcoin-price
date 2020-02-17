<?php

namespace App\Services;

/**
 * Interface PriceProviderInterface
 * @package App\Services
 */
Interface PriceProviderInterface
{
    /**
     * @return array
     */
    public function prices(): array;
}