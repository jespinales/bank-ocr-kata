<?php


namespace Tests\Domain\Model\Number;


use PHPUnit\Framework\TestCase;
use Project\Domain\Model\Number\Digit;

class DigitTest extends TestCase
{
    const N0 =  " _ " .
                "| |" .
                "|_|";

    const N1 =  "   " .
                "  |" .
                "  |";

    const N2 =  " _ " .
                " _|" .
                "|_ ";

    const N3 =  " _ " .
                " _|" .
                " _|";

    const N4 =  "   " .
                "|_|" .
                "  |";

    const N5 =  " _ " .
                "|_ " .
                " _|";

    const N6 =  " _ " .
                "|_ " .
                "|_|";

    const N7 =  " _ " .
                "  |" .
                "  |";

    const N8 =  " _ " .
                "|_|" .
                "|_|";

    const N9 =  " _ " .
                "|_|" .
                " _|";

    /**
     * @test
     */
    public function getTheCorrectValue()
    {
        $digit = new Digit(self::N0);
        $this->assertEquals(0, $digit->getRealDigit());

        $digit = new Digit(self::N1);
        $this->assertEquals(1, $digit->getRealDigit());

        $digit = new Digit(self::N2);
        $this->assertEquals(2, $digit->getRealDigit());

        $digit = new Digit(self::N3);
        $this->assertEquals(3, $digit->getRealDigit());

        $digit = new Digit(self::N4);
        $this->assertEquals(4, $digit->getRealDigit());

        $digit = new Digit(self::N5);
        $this->assertEquals(5, $digit->getRealDigit());

        $digit = new Digit(self::N6);
        $this->assertEquals(6, $digit->getRealDigit());

        $digit = new Digit(self::N7);
        $this->assertEquals(7, $digit->getRealDigit());

        $digit = new Digit(self::N8);
        $this->assertEquals(8, $digit->getRealDigit());

        $digit = new Digit(self::N9);
        $this->assertEquals(9, $digit->getRealDigit());
    }

    /**
     * @test
     *
     */
    public function cannotBeCreatedWithInvalidInput()
    {
        $this->expectException(\InvalidArgumentException::class);

        $input = " _ " .
                 "|_|" .
                 "  |";

        $digit = new Digit($input);
    }
}