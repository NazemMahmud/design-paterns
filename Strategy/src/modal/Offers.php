<?php

namespace Piash\StrategyPattern\Modal;

class Offers
{

    const OFFERS = ['B1G1', 'Bulk_Discount'];

    /**
     * product_code => []
     */
    const PRODUCT_OFFER = [
        'MG1' => ['B1G1'], // offer name
        'SR1' => ['Bulk_Discount', 3, 4.5] // offer name, product amount on which offer takes place, reduced price
    ];


    /**
     * find offer rule based on product key
     *
     * @param string $code
     * @return array
     */
    public static function getProductOffer(string $code): array
    {
        return array_filter(self::PRODUCT_OFFER, function($k) use($code) {
            return $k === $code;
        }, ARRAY_FILTER_USE_KEY);
    }
}