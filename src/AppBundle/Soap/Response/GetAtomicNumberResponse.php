<?php

namespace AppBundle\Soap\Response;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicNumber
 * @package AppBundle\Soap\Response
 * @Soap\Alias("getAtomicNumberResponse")
 */
class GetAtomicNumberResponse
{
    /**
     * @var string $atomicNumber
     * @Soap\ComplexType("int")
     */
    private $atomicNumber;

    /**
     * @var string $status
     * @Soap\ComplexType("string", nillable=false)
     */
    private $status;

    /**
     * @return string
     */
    public function getatomicNumber()
    {
        return $this->atomicNumber;
    }

    /**
     * @param string $atomicNumber
     * @return GetAtomicNumberResponse
     */
    public function setatomicNumber($atomicNumber)
    {
        $this->atomicNumber = $atomicNumber;

        return $this;
    }


    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
