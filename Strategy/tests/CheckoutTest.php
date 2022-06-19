<?php

use PHPUnit\Framework\TestCase;
use Piash\StrategyPattern\Service\Checkout;
use Piash\StrategyPattern\Modal\Products;

class CheckoutTest extends TestCase
{
    private Checkout $checkout;

    /**
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->checkout = new Checkout(new Products());
    }

    public function test_checkout_first() {
        $this->checkout->addByCode('MG1');
        $this->checkout->addByCode('SR1');
        $this->checkout->addByCode('MG1');
        $this->checkout->addByCode('MG1');
        $this->checkout->addByCode('BN1');
        $price = $this->checkout->total;
        dump('Test 1: Price:: ' . $price);
        $this->assertEquals(19.45, $price);
    }

    public function test_checkout_second() {
        $this->checkout->addByCode('MG1');
        $this->checkout->addByCode('MG1');
        $price = $this->checkout->total;
        dump('Test 2: Price:: ' . $price);
        $this->assertEquals(3.11, $price);
    }

    public function test_checkout_third() {
        $this->checkout->addByCode('SR1');
        $this->checkout->addByCode('MG1');
        $this->checkout->addByCode('SR1');
        $this->checkout->addByCode('SR1');
        $price = $this->checkout->total;
        dump('Test 3: Price:: ' . $price);
        $this->assertEquals(11.61, $price);
    }

}