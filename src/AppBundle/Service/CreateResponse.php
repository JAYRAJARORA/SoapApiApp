<?php

namespace AppBundle\Service;

use AppBundle\Soap\Response\GetAtomicNumberResponse;
use AppBundle\Soap\Response\GetAtomicWeightResponse;
use AppBundle\Soap\Response\GetAtomsResponse;

class CreateResponse
{
    public function getAtomicNumberResponse($atomicNumber, $status)
    {
        $response = new GetAtomicNumberResponse();
        $response->setatomicNumber($atomicNumber)
        ->setStatus($status);
        
        return $response;
    }

    public function getAtomicWeightResponse($atomicWeight, $status)
    {
        $response = new GetAtomicWeightResponse();
        $response->setatomicWeight($atomicWeight)
            ->setStatus($status);

        return $response;
    }

}