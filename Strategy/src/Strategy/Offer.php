<?php

namespace Piash\StrategyPattern\Strategy;

interface Offer {
    /**
     * @param array $product [code, qty, price, offer]
     * @return float
     */
    public function calculatePrice(array $product): float;
}