<?php

namespace Piash\StrategyPattern\Strategy;


class OfferContext
{
    /**
     * Select specific concrete strategy for different type of offer
     *
     * @param string $offerName
     * @return Offer
     */
    public static function getOfferType(string $offerName): Offer
    {
        return match ($offerName) {
            "B1G1" => new BuyOneGetOne(),
            "Bulk_Discount" => new BulkDiscount(),
            default => [],
        };
    }
}