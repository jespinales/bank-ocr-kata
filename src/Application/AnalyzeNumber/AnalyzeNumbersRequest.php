<?php


namespace Project\Application\AnalyzeNumber;


class AnalyzeNumbersRequest
{
    /**
     * @var string
     */
    public $file;

    /**
     * AnalyzeNumbersRequest constructor.
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }
}