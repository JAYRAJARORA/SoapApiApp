<?php

namespace AppBundle\Soap\Request;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicNumber
 * @package AppBundle\Soap\Request
 * @Soap\Alias("getAtomicNumber")
 */
class GetAtomicNumberRequest
{
    /**
     * @var string $elementName
     * @Soap\ComplexType("string", nillable=false)
     */
    private $elementName;

    /**
     * @return string
     */
    public function getElementName()
    {
        return $this->elementName;
    }

    /**
     * @param string $elementName
     * @return string
     */
    public function setElementName($elementName)
    {
        return $this->elementName = $elementName;
    }
}
