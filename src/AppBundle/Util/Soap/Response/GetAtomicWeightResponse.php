<?php
/**
 * Class containing the format for Atomic Weight api response in wsdl
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
 * Class GetAtomicWeightResponse
 *
 * @category HelperClass
 * @package AppBundle\Util\Soap\Response
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
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
