<?php

namespace AppBundle\Controller;

use AppBundle\Soap\Request\GetAtomicNumberRequest;
use AppBundle\Soap\Request\GetAtomicWeightRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * @Soap\Header("checkAuth", phpType="AppBundle\Soap\Header\CheckAuthHeader")
 * Class BeSimpleSoapController
 * @package AppBundle\Controller
 */
class BeSimpleSoapController extends Controller
{
    /**
     * @param GetAtomicNumberRequest $getAtomicNumberRequest
     * @return \AppBundle\Soap\Response\GetAtomicNumberResponse
     * @throws \SoapFault
     *
     * @Soap\Method("getAtomicNumber")
     * @Soap\Param("getAtomicNumberRequest", phpType="AppBundle\Soap\Request\GetAtomicNumberRequest")
     * @Soap\Result(phpType="AppBundle\Soap\Response\GetAtomicNumberResponse")
     */
    public function getAtomicNumber(GetAtomicNumberRequest $getAtomicNumberRequest)
    {
        $header = $this->container->get("request")
            ->getSoapHeaders()->get('checkAuth');
        $this->get('soap_request')->validateHeader($header);

        $elementName = $getAtomicNumberRequest->getElementName();
        $this->get('soap_request')->validateElementName($elementName);
        $atomicNumber = $this->get('periodic_table')
            ->getAtomicNumber($elementName, 1);
        $status = 'Atom found with element '. $elementName;
        $response = $this->get('soap_response')
            ->getAtomicNumberResponse($atomicNumber, $status);

        return $response;
    }

    /**
     * @param GetAtomicWeightRequest $getAtomicWeightRequest
     * @return \AppBundle\Soap\Response\GetAtomicWeightResponse
     * @throws \SoapFault
     *
     * @Soap\Method("getAtomicWeight")
     * @Soap\Param("getAtomicWeightRequest", phpType="AppBundle\Soap\Request\GetAtomicWeightRequest")
     * @Soap\Result(phpType="AppBundle\Soap\Response\GetAtomicWeightResponse")
     */
    public function getAtomicWeight(GetAtomicWeightRequest $getAtomicWeightRequest)
    {
        $header = $this->container->get("request")
            ->getSoapHeaders()->get('checkAuth');

        $this->get('soap_request')->validateHeader($header);

        $elementName = $getAtomicWeightRequest->getElementName();
        $this->get('soap_request')->validateElementName($elementName);
        $atomicWeight = $this->get('periodic_table')
            ->getAtomicWeight($elementName, 1);
        $status = 'Atom found with element '. $elementName;
        $response = $this->get('soap_response')
            ->getAtomicWeightResponse($atomicWeight, $status);

        return $response;
    }
}