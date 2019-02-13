<?php
/**
 * Service to create response for the beSimple Soap Response Apis
 *
 * @category  Service
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Service;

use AppBundle\Util\Soap\Response\GetAtomicNumberResponse;
use AppBundle\Util\Soap\Response\GetAtomicWeightResponse;

/**
 * Class CreateResponse
 *
 * @category Service
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class CreateResponse
{
    /**
     * Response for the atomic Number SoapApi
     * @param $atomicNumber
     * @param $status
     * @return GetAtomicNumberResponse
     */
    public function getAtomicNumberResponse($atomicNumber, $status)
    {
        $response = new GetAtomicNumberResponse();
        $response->setAtomicNumber($atomicNumber)->setStatus($status);
        
        return $response;
    }

    /**
     * Response for the atomic Weight SoapApi
     * @param $atomicWeight
     * @param $status
     * @return GetAtomicWeightResponse
     */
    public function getAtomicWeightResponse($atomicWeight, $status)
    {
        $response = new GetAtomicWeightResponse();
        $response->setAtomicWeight($atomicWeight)->setStatus($status);

        return $response;
    }
}
