<?php
/**
 * Class containing the format for Atomic Number api request in wsdl
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Util\Soap\Request;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicNumber
 *
 * @category HelperClass
 * @package AppBundle\Soap\Request
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
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
