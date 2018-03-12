<?php
/**
 * Class containing the format for header in wsdl
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
namespace AppBundle\Util\Soap\Header;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class CheckAuthHeader
 *
 * @category HelperClass
 * @package AppBundle\Soap\Header
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @Soap\Alias("header")
 */
class CheckAuthHeader
{
    /**
     * @var string $username
     * @Soap\ComplexType("string", nillable=false)
     */
    private $username;

    /**
     * @var string $password
     * @Soap\ComplexType("string", nillable=false)
     */
    private $password;


    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return string
     */
    public function setUsername($username)
    {
        return $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return string
     */
    public function setPassword($password)
    {
        return $this->password = $password;
    }
}
