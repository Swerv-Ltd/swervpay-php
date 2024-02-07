<?php

namespace Swervpaydev\SDK\Models;


class Model
{
    /**
     * The resource attributes.
     *
     * @var array
     */
    public $attributes;

    /**
     * Create a new model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;


        $this->fill();
    }

    /**
     * Fill the model with the array of attributes.
     *
     * @return void
     */
    protected function fill()
    {
        foreach ($this->attributes as $key => $value) {
            //$key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }


    public function toArray(): array
    {
        $publicProperties = get_object_vars($this);


        return $publicProperties;
    }
}
