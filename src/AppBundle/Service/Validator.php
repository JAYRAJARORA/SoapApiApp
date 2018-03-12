<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use AppBundle\Constants\SoapConstants;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class AtomValidator
{
    private $em;
    private $securityEncoder;
    private $fosUserManager;

    public function __construct(
        EntityManager $entityManager,
        UserManager $userManager,
        EncoderFactory $encoderFactory
    ) {
        $this->em = $entityManager;
        $this->securityEncoder = $encoderFactory;
        $this->fosUserManager = $userManager;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function validateUser($username, $password)
    {
        $user = $this->fosUserManager->findUserByUsername($username);
        if (!$user) {
            return false;
        }
        $encoder = $this->securityEncoder->getEncoder($user);
        $salt = $user->getSalt();

        return $encoder->isPasswordValid(
            $user->getPassword(),
            $password,
            $salt
        );
    }


    /**
     * @param $header
     * @throws \SoapFault
     */
    public function validateHeader($header)
    {
        if (!$header) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::HEADER_REQUIRED
            );
        }
        $headerData = $header->getData();
        $username = $headerData->username;
        $password = $headerData->password;

        $validateUser = $this->validateUser($username, $password);
        if (!$validateUser) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::AUTHENTICATION_ERROR
            );
        }
    }

    /**
     * @param $elementName
     * @throws \SoapFault
     */
    public function validateElementName($elementName)
    {
        if (!$elementName || $elementName === '?') {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::ELEMENT_REQUIRED
            );
        } elseif (!preg_match('/^[A-Za-z].*$/', $elementName)) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::INVALID_ELEMENT_NAME
            );
        }
    }
}