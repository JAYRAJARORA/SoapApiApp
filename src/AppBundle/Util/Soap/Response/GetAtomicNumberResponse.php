<?php
/**
 * Class containing the format for Atomic Number api response in wsdl
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Util\Soap\Response;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicNumberResponse
 *
 * @category HelperClass
 * @package AppBundle\Util\Soap\Response
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
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
    public function getAtomicNumber()
    {
        return $this->atomicNumber;
    }

    /**
     * @param string $atomicNumber
     * @return GetAtomicNumberResponse
     */
    public function setAtomicNumber($atomicNumber)
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
     * @return string
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
