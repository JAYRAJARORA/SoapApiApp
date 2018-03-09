<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;
use AppBundle\Constants\SoapConstants;

class HandleRequest
{
    private $classToHandle;

    /**
     * HandleRequest constructor.
     * @param PeriodicTableUtil $periodicTableUtil
     */
    public function __construct(PeriodicTableUtil $periodicTableUtil)
    {
        $this->classToHandle = $periodicTableUtil;
    }

    /**
     * @return Response
     */
    public function serveRequest()
    {
        try {
            ini_set("soap.wsdl_cache_enabled", "0");
            $server = new \SoapServer(
                SoapConstants::WSDL
            );
            $server->setObject($this->classToHandle);
            $response = new Response();
            $response->headers->set(
                SoapConstants::CONTENT_TPYE,
                SoapConstants::XML_CONTENT_VALUE
            );
            ob_start();
            $server->handle();
            $response->setContent(ob_get_clean());
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        return $response;
    }

    /**
     * @param $header
     * @throws \SoapFault
     */
    public function validateHeader($header)
    {
        if (!$header) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::HEADER_REQUIRED
            );
        }
        $headerData = $header->getData();
        $username = $headerData->username;
        $password = $headerData->password;

        $validateUser = $this->classToHandle
            ->validateUser($username, $password);
        if (!$validateUser) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::AUTHENTICATION_ERROR
            );
        }
    }

    /**
     * @param $elementName
     * @throws \SoapFault
     */
    public function validateElementName($elementName)
    {
        if (!$elementName || $elementName === '?') {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::ELEMENT_REQUIRED
            );
        }
    }
}