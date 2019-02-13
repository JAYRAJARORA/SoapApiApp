<?php
/**
 * Class containing the format for Atomic Weight api request in wsdl
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Util\Soap\Request;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicWeight
 *
 * @category HelperClass
 * @package AppBundle\Util\Soap\Request
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @Soap\Alias("getAtomicWeight")
 */
class GetAtomicWeightRequest
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
