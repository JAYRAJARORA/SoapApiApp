<?php
/**
 * Class containing the format for Atomic Number api response in wsdl
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
namespace AppBundle\Util\Soap\Response;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class GetAtomicNumberResponse
 *
 * @category HelperClass
 * @package AppBundle\Util\Soap\Response
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
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
