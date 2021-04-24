<?php


namespace Tests\Domain\Model\Number;


use PHPUnit\Framework\TestCase;
use Project\Domain\Model\Number\Digit;
use Project\Domain\Model\Number\Number;

class NumberTest extends TestCase
{
    /**
     * @test
     */
    public function createVoid()
    {
        $number = new Number([]);
        $this->assertEmpty($number->getDigits());
    }

    /**
     * @test
     */
    public function createWithDigits()
    {
        $number = new Number([ new Digit(Digit::N9) ]);
        $this->assertNotEmpty($number->getDigits());
    }

    /**
     * @test
     */
    public function addADigitAtTheEnd()
    {
        $number = new Number([ new Digit(Digit::N9) ]);
        $number->pushDigit( new Digit(Digit::N8) );

        $this->assertCount(2, $number->getDigits());
    }

    /**
     * @test
     */
    public function getTheCorrectNumber()
    {
        $number = new Number([
            new Digit(Digit::N9),
            new Digit(Digit::N8)
        ]);

        $this->assertEquals('98', $number->getNumber());
    }
}