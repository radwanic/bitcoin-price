<?php

namespace App\Charts;

/**
 * Class Chart
 * @package App\Charts
 */
class Chart
{
    /**
     * @var
     */
    protected $attributes;

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @return mixed
     */
    public function getAttribute($key)
    {
        return @$this->attributes[$key];
    }
}