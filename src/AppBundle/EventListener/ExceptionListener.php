<?php

/**
 * ExceptionListener to intercept any exceptions in the code
 *
 * PHP version 7.0
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  ExceptionListener
 * @package   ProductBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      http://pear.php.net/package/PackageName
 */

namespace AppBundle\EventListener;

use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Class ResponseForControllerListener Doc Comment
 *
 * @category ExceptionListener
 * @package  ProductBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class ExceptionListener
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
    /**
     * Catch Exceptions and show appropriate messages here
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();
        $message = 'Sorry there is error in the code.';
        $this->logger->debug(
            'Exception in Apis',
            array(
                $exception->getMessage()
            )
        );

        // Customizing the response object to display the exception details
        $response = new Response();
        $response->setContent($message);

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $this->logger->debug(
            'Exception Response',
            array(
                $exception->getMessage(),$exception->getCode()
            )
        );
        // Send the modified response object to the event
        $event->setResponse($response);
    }
}