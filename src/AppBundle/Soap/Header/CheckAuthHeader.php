<?php

namespace AppBundle\Soap\Header;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;

/**
 * Class CheckAuthHeader
 * @package AppBundle\Soap\Header
 * @Soap\Alias("def")
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
     */
    public function setPassword($password)
    {
        return $this->password = $password;
    }
}