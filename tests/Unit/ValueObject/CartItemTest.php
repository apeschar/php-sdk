<?php declare(strict_types=1);

namespace MultiSafepay\Tests\Unit\ValueObject;

use MultiSafepay\Exception\InvalidArgumentException;
use MultiSafepay\ValueObject\CartItem;
use PHPUnit\Framework\TestCase;

/**
 * Class CartItemTest
 * @package MultiSafepay\Tests\Unit\ValueObject
 */
class CartItemTest extends TestCase
{
    /**
     * Test for addTaxRate method
     */
    public function testAddTaxRate()
    {
        $taxRate = 21;
        $cartItem = new CartItem();
        $cartItem->addTaxRate($taxRate);
        $this->assertEquals($taxRate, $cartItem->getTaxRate());
    }

    /**
     * Test for addTaxRate method
     */
    public function testAddTaxRateHigherThan100()
    {
        $this->expectException(InvalidArgumentException::class);
        $taxRate = 121;
        $cartItem = new CartItem();
        $cartItem->addTaxRate($taxRate);
    }

    /**
     * Test for addTaxRate method
     */
    public function testAddTaxRateLowerThan0()
    {
        $this->expectException(InvalidArgumentException::class);
        $taxRate = -1;
        $cartItem = new CartItem();
        $cartItem->addTaxRate($taxRate);
    }
}