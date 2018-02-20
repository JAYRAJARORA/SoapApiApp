<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;

class HandleRequest
{
    private $classToHandle;
    public function __construct(PeriodicTableUtil $periodicTableUtil)
    {
        $this->classToHandle = $periodicTableUtil;
    }

    /**
     * Handle the incoming soap requests coming from the client
     * @param $classname
     * @param $url
     * @return Response
     */
    public function handleRequest()
    {
        try {
            ini_set("soap.wsdl_cache_enabled", "0");
            $server = new \SoapServer(
                'http://soapapi.test/public/WSDL/PeriodicTable.wsdl'
            );
            $server->setObject($this->classToHandle);
            $response = new Response();
            $response->headers->set(
                'Content-Type',
                'text/xml; charset=ISO-8859-1'
            );
            ob_start();
            $server->handle();
            $response->setContent(ob_get_clean());
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        return $response;
    }
}