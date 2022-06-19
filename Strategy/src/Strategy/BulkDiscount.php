<?php

namespace Piash\StrategyPattern\Strategy;


class BulkDiscount implements Offer
{

    /**
     * If buy item >= conditional_qty, then reduce the price according to offer rule
     *
     * @param array $product [code, qty, price, offer]
     * $product[offer] => [offer_code, conditional_qty, reduced_price]
     * @return float
     */
    public function calculatePrice(array $product): float
    {
        $code = $product['code'];
        // if qty >=3, price dropped to 4.5 from original price
        return $product['qty'] >= $product['offer'][$code][1] ? $product['offer'][$code][2] : $product['price'];
    }
}