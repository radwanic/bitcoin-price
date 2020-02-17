<?php

namespace App\Charts;

/**
 * Class ChartJS
 * @package App\Charts
 */
class ChartJS extends Chart
{
    /**
     * @return array
     */
    public function data(): array {
        return [
            'type' => @$this->attributes['type'],
            'data' => @$this->attributes['data'],
        ];
    }
}