<?php


namespace Project\Application\AnalyzeNumber;


class AnalyzeNumbersResponse
{
    /**
     * @var string
     */
    public $numbers;

    public function __construct(string $numbers)
    {
        $this->numbers = $numbers;
    }
}