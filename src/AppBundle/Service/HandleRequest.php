<?php
/**
 * Service to handle request by PHP SoapServer
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

use AppBundle\Entity\Atom;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Constants\SoapConstants;

/**
 * Class HandleRequest
 *
 * @category Service
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class HandleRequest
{
    private $classToHandle;
    private $logger;
    private $em;
    private $validator;

    /**
     * The class which handles incoming requests
     * HandleRequest constructor.
     * @param PeriodicTable $periodicTableUtil
     * @param Logger $logger
     * @param EntityManager $entityManager
     * @param Validator $validator
     */
    public function __construct(
        PeriodicTable $periodicTableUtil,
        Logger $logger,
        EntityManager $entityManager,
        Validator $validator
    ) {
        $this->classToHandle = $periodicTableUtil;
        $this->logger = $logger;
        $this->em = $entityManager;
        $this->validator = $validator;
    }

    /**
     *
     * @return Response
     */
    public function serveRequest()
    {
        try {
            // disable cache to create new Responses everytime for debugging purpose
            ini_set("soap.wsdl_cache_enabled", "0");
            $server = new \SoapServer(
                SoapConstants::WSDL
            );
            /**
             * class containing the Soap Methods
             * which takes in request and handles response
             */
            $server->setObject($this->classToHandle);
            // setting the response using output buffering
            $response = new Response();
            $response->headers->set(
                SoapConstants::CONTENT_TPYE,
                SoapConstants::XML_CONTENT_VALUE
            );
            ob_start();
            $server->handle();
            $response->setContent(ob_get_clean());
        } catch (\Exception $exc) {
            $this->logger->debug(
                'ServerError',
                array($exc->getMessage())
            );
        }
        return $response;
    }
}
