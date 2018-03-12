<?php
/**
 * Controller to handle request using BeSimpleSoap Component.
 * Request, responses and name of method included in wsdl
 * is given through annotations of actions.
 * Various actions itself handles the incoming request
 *
 * PHP version 7.0.25
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Controller
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Controller;

use AppBundle\Util\Soap\Request\GetAtomicNumberRequest;
use AppBundle\Util\Soap\Request\GetAtomicWeightRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;
use AppBundle\Constants\SoapConstants;

/**
 * Class BeSimpleSoapController
 *
 * @category Controller
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * Header to verify the user credentials
 * @Soap\Header("checkAuth", phpType="AppBundle\Util\Soap\Header\CheckAuthHeader")
 * Class BeSimpleSoapController
 * @package AppBundle\Controller
 */
class BeSimpleSoapController extends Controller
{
    /**
     * Action for generating wsdl using annotations and
     * handling the request made to the method
     *
     * @param GetAtomicNumberRequest $getAtomicNumberRequest
     * @return \AppBundle\Util\Soap\Response\GetAtomicNumberResponse
     * @throws \SoapFault
     *
     * @Soap\Method("getAtomicNumber")
     * @Soap\Param(
     *     "getAtomicNumberRequest",
     *     phpType="AppBundle\Util\Soap\Request\GetAtomicNumberRequest"
     * )
     * @Soap\Result(phpType="AppBundle\Util\Soap\Response\GetAtomicNumberResponse")
     */
    public function getAtomicNumber(GetAtomicNumberRequest $getAtomicNumberRequest)
    {
        // retrieve soap headers and data from request
        $header = $this->container->get("request")
            ->getSoapHeaders()->get('checkAuth');
        $elementName = $getAtomicNumberRequest->getElementName();

        // validation of header and input data
        $this->get(SoapConstants::VALIDATE_REQUEST)->validateHeader($header);
        $this->get(SoapConstants::VALIDATE_REQUEST)->validateElementName($elementName);

        // retrieve the atomicNumber
        $atomicNumber = $this->get('periodic_table')
            ->getAtomicNumber($elementName);
        $status = 'Atom found with element '. $elementName;

        // setting appropriate response
        return $this->get('soap_response')
            ->getAtomicNumberResponse($atomicNumber, $status);
    }

    /**
     * Action for generating wsdl using annotations and
     * handling the request made to the method
     *
     * @param GetAtomicWeightRequest $getAtomicWeightRequest
     * @return \AppBundle\Util\Soap\Response\GetAtomicWeightResponse
     * @throws \SoapFault
     *
     * @Soap\Method("getAtomicWeight")
     * @Soap\Param(
     *     "getAtomicWeightRequest",
     *     phpType="AppBundle\Util\Soap\Request\GetAtomicWeightRequest"
     * )
     * @Soap\Result(phpType="AppBundle\Util\Soap\Response\GetAtomicWeightResponse")
     */
    public function getAtomicWeight(GetAtomicWeightRequest $getAtomicWeightRequest)
    {
        // retrieve soap headers and data from request
        $header = $this->container->get("request")
            ->getSoapHeaders()->get('checkAuth');
        $elementName = $getAtomicWeightRequest->getElementName();

        // validation of header and input data
        $this->get(SoapConstants::VALIDATE_REQUEST)->validateHeader($header);
        $this->get(SoapConstants::VALIDATE_REQUEST)->validateElementName($elementName);

        // retrieve the atomicWeight
        $atomicWeight = $this->get('periodic_table')
            ->getAtomicWeight($elementName);
        $status = 'Element found with name '. $elementName;

        // setting appropriate response
        return $this->get('soap_response')
            ->getAtomicWeightResponse($atomicWeight, $status);
    }
}
