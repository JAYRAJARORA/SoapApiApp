<?php

namespace AppBundle\Service;

use AppBundle\Soap\Response\GetAtomicNumberResponse;

class CreateResponse
{
    public function getAtomicNumberResponse($atomicNumber, $status)
    {
        $response = new GetAtomicNumberResponse();
        $response->setatomicNumber($atomicNumber)
        ->setStatus($status);
        
        return $response;
    }
}