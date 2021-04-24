<?php


namespace Project\Infrastructure\Delivery\Api\Symfony\Controller;


use Project\Application\AnalyzeNumber\AnalyzeNumbers;
use Project\Application\AnalyzeNumber\AnalyzeNumbersRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnalyzeNumbersController extends AbstractController
{
    const FILE = 'userCases/user-case-1.txt';

    public function __invoke()
    {
        $analyzeNumberService = new AnalyzeNumbers();
        $response = $analyzeNumberService( new AnalyzeNumbersRequest(self::FILE) );
        return $this->json( $response->numbers );
    }

}