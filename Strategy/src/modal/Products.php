<?php

namespace Piash\StrategyPattern\Modal;

class Products
{
    /**
     * @var array
     */
    protected array $product = [];

    const PRODUCTS = [
        [
            'id' => 1,
            'code' => 'MG1',
            'name' => 'Mango',
            'price' => 3.11
        ],
        [
            'id' => 2,
            'code' => 'SR1',
            'name' => 'Strawberries',
            'price' => 5.00
        ],
        [
            'id' => 3,
            'code' => 'BN1',
            'name' => 'Banana',
            'price' => 8.23
        ],
    ];

    /**
     * filter from products by key (code, name etc.) & value
     *
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public function where(string $key, mixed $value): Products {
        $this->product = array_filter(self::PRODUCTS, function($v, $k) use($key, $value)  {
            return $v[$key] === $value;
        }, ARRAY_FILTER_USE_BOTH);

        return $this;
    }


    /**
     * return the first item only
     *
     * @return array
     */
    public function first(): array {
        return array_values($this->product)[0];
    }
}