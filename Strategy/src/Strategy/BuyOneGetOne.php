<?php

namespace Piash\StrategyPattern\Strategy;


class BuyOneGetOne implements Offer
{

    /**
     * Get 1 item free for buying 1 item
     *
     * @param array $product
     * @return float
     */
    public function calculatePrice(array $product): float
    {
        $quantity = floor($product['qty'] / 2) + $product['qty'] % 2;
        return $quantity * $product['price'];
    }
}