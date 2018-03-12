<?php
/**
 * Service to create response for the beSimple Soap Response Apis
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Service
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
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
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
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
        $response->setAtomicNumber($atomicNumber)
        ->setStatus($status);
        
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
        $response->setAtomicWeight($atomicWeight)
            ->setStatus($status);

        return $response;
    }
}
