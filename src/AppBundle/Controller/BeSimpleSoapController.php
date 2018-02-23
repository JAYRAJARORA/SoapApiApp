<?php

namespace AppBundle\Controller;

use AppBundle\Soap\Request\GetAtomicNumberRequest;
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
}