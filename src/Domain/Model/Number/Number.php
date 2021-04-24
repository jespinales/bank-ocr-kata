<?php


namespace Project\Domain\Model\Number;


use InvalidArgumentException;

class Number
{
    /**
     * @var Digit[]
     */
    private $digits;

    /**
     * Number constructor.
     * @param Digit[] $digits
     */
    public function __construct(array $digits = [])
    {
        $this->validateDigits($digits);
        $this->digits = $digits;
    }

    /**
     * @param Digit[] $digits
     */
    private function validateDigits(array $digits)
    {
        foreach ($digits as $digit){
            if(!$digit instanceof Digit){
                throw new InvalidArgumentException();
            }
        }
    }

    /**
     * @return Digit[]
     */
    public function getDigits(): array
    {
        return $this->digits;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        $number = '';

        foreach ($this->digits as $digit)
        {
            $number .= $digit->getRealDigit();
        }

        return $number;
    }

    /**
     * @param Digit $digit
     */
    public function pushDigit(Digit $digit)
    {
        array_push($this->digits, $digit);
    }

}