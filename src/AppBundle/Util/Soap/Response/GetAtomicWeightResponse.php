<?php
/**
 * Class containing the format for Atomic Weight api response in wsdl.
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 **/
namespace AppBundle\Util\Soap\Response;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicWeightResponse
 *
 * @category HelperClass
 * @package AppBundle\Util\Soap\Response
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @Soap\Alias("getAtomicWeightResponse")
 */
class GetAtomicWeightResponse
{
    /**
     * @var string $atomicWeight
     * @Soap\ComplexType("string")
     */
    private $atomicWeight;

    /**
     * @var string $status
     * @Soap\ComplexType("string", nillable=false)
     */
    private $status;

    /**
     * @return string
     */
    public function getAtomicWeight()
    {
        return $this->atomicWeight;
    }

    /**
     * @param string $atomicWeight
     * @return GetatomicWeightResponse
     */
    public function setAtomicWeight($atomicWeight)
    {
        $this->atomicWeight = $atomicWeight;

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
