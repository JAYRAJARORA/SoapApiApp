<?php

/**
 * ExceptionListener to intercept any exceptions in the code.
 *
 * @category  ExceptionListener
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */

namespace AppBundle\EventListener;

use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Class ExceptionListener
 *
 * @category ExceptionListener
 * @package  ProductBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class ExceptionListener
{
    private $logger;

    /**
     * ExceptionListener constructor.
     * @param Logger $logger
     */
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
    }
}
