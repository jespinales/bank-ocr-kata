<?php


namespace Project\Domain\Model\Number;


use InvalidArgumentException;

class Digit
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

    const DIGITS = [
        self::N0 => 0,
        self::N1 => 1,
        self::N2 => 2,
        self::N3 => 3,
        self::N4 => 4,
        self::N5 => 5,
        self::N6 => 6,
        self::N7 => 7,
        self::N8 => 8,
        self::N9 => 9,
    ];

    private $digit;
    private $real_digit;

    public function __construct(string $digit)
    {
        $this->validate($digit);
        $this->digit = $digit;
        $this->real_digit = self::DIGITS[$digit];
    }

    public function validate(string $digit){
        if( !array_key_exists($digit, self::DIGITS) )
            throw new InvalidArgumentException();
    }

    public function getDigit(): string
    {
        return $this->digit;
    }

    public function getRealDigit(): int
    {
        return $this->real_digit;
    }


}