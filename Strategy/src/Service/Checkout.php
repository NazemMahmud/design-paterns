<?php

namespace Piash\StrategyPattern\Service;

use Piash\StrategyPattern\Modal\Products;
use Piash\StrategyPattern\Modal\Offers;
use Piash\StrategyPattern\Strategy\OfferContext;


class Checkout
{
    public float $total = 0;

    private array $order = [];

    public function __construct(protected Products $product) {
    }


    /**
     * Add new product item into cart using product code
     *
     * @param string $code
     * @return void
     */
    public function addByCode(string $code): void {
        $item =  $this->product->where('code', $code)->first();
        if ($item) {
            // add item in order list
            $this->order[] = [
                'product_id' => $item['id']
            ];
            // calculate total
            $this->total = $this->getTotal();
        }
    }

    /**
     * Calculate total based on, quantity, price and offer rule (i.e. strategy pattern) if any
     *
     * @return float
     */
    private function getTotal(): float {
        $order_products = [];
        foreach ($this->order as $item) {
            $product =  $this->product->where('id', $item['product_id'])->first();
            $code = $product['code'];
            $order_products[$code]['code'] = $code;
            $order_products[$code]['qty'] = isset($order_products[$code]['qty']) ?
                ++$order_products[$code]['qty'] : 1;
            $order_products[$code]['price'] = $product['price'];
        }

        $total = 0;
        foreach ($order_products as $item) {
            // check offer rules
            $offer = Offers::getProductOffer($item['code']);
            $total += $offer ? $this->getFromStrategy(array_merge($item, ['offer' => $offer])) :
                $item['qty'] * $item['price'];
        }
        return $total;
    }

    /**
     * Calculate price according to offer strategy
     *
     * @param array $product
     * @return float
     */
    private function getFromStrategy(array $product): float {
        $code = $product['code'];
        $strategy = OfferContext::getOfferType($product['offer'][$code][0]);
        return $strategy->calculatePrice($product);
    }
}