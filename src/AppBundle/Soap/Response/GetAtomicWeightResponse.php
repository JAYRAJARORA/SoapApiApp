<?php

namespace AppBundle\Soap\Response;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetatomicWeight
 * @package AppBundle\Soap\Response
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
    public function getatomicWeight()
    {
        return $this->atomicWeight;
    }

    /**
     * @param string $atomicWeight
     * @return GetatomicWeightResponse
     */
    public function setatomicWeight($atomicWeight)
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
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
