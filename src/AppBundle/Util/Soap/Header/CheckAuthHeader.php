<?php
/**
 * Class containing the format for header in wsdl
 *
 * @category  HelperClass
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Util\Soap\Header;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class CheckAuthHeader
 *
 * @category HelperClass
 * @package AppBundle\Soap\Header
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
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
