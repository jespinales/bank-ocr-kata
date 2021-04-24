<?php


namespace Project\Application\AnalyzeNumber;


use Project\Domain\Model\Number\Digit;
use Project\Domain\Model\Number\Number;

class AnalyzeNumbers
{
    const LINES_BY_NUMBER = 4;

    public function __invoke(AnalyzeNumbersRequest $request): AnalyzeNumbersResponse
    {
        $chrGrouped = $this->groupByNumbersAndDigits($request->file);
        $numbers = $this->createNumbers($chrGrouped);
        $numbers = $this->chainNumbers($numbers);

        return new AnalyzeNumbersResponse($numbers);
    }

    /**
     * @param string $file
     * @return array
     */
    private function groupByNumbersAndDigits(string $file): array
    {
        $handle = fopen($file, 'r');
        $chrArray = [];

        $realLines = 0;
        $logicalLines = 0;

        $lineGrid = [];
        while (!feof($handle)) {
            $line = fgets($handle);
            $line = preg_replace('/[^_| ]/', '', $line);
            $realLines++;

            if ($realLines === self::LINES_BY_NUMBER) {
                $logicalLines++;
                $realLines = 0;
                $chrArray[] = $lineGrid;
                $lineGrid = [];
                continue;
            }

            $chunked = str_split($line, 3);

            if (!count($lineGrid)) {
                $lineGrid = $chunked;
                continue;
            }

            array_walk($lineGrid, function (&$item, $index, $newArray) {
                $item .= $newArray[$index];
            }, $chunked);
        }

        return $chrArray;
    }

    /**
     * @param array $chrNumbers
     * @return array
     */
    private function createNumbers(array $chrNumbers): array
    {
        $numbers = [];

        foreach ($chrNumbers as $chrNumber)
        {
            $numbers[] = $this->createNumber($chrNumber);
        }

        return $numbers;
    }

    /**
     * @param array $chrDigits
     * @return Number
     */
    private function createNumber(array $chrDigits): \Project\Domain\Model\Number\Number
    {
        $number = new Number();
        foreach ($chrDigits as $chrDigit){
            $number->pushDigit( new Digit($chrDigit) );
        }
        return $number;
    }

    /**
     * @param Number[] $numbers
     */
    private function chainNumbers(array $numbers): string
    {
        array_walk($numbers, function (Number &$number) {
            $number = $number->getNumber();
        });

        return implode(', ', $numbers);
    }
}