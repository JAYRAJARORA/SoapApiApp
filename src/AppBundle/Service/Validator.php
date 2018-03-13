<?php
/**
 * Service to validate user entered in header and the input data
 *
 * PHP version 7.0.25
 *
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Service
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Service;

use AppBundle\Entity\Atom;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use AppBundle\Constants\SoapConstants;
use ProxyManager\Factory\RemoteObject\Adapter\Soap;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 * Class Validator
 *
 * @category Service
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class Validator
{
    private $em;
    private $securityEncoder;
    private $fosUserManager;

    /**
     * Validator constructor.
     * @param EntityManager $entityManager
     * @param UserManager $userManager
     * @param EncoderFactory $encoderFactory
     */
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
     * User to validate in the header
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
     * @param $header object
     * @param $flag integer flag = 0|1 (0 for PHP Soap Server
     * Apis and 1 for BeSimple Soap Server)
     *
     * @throws \SoapFault
     * @return bool
     */
    public function validateHeader($header, $flag = 1)
    {
        if (!$header) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::HEADER_REQUIRED
            );
        }
        // if it is a BeSimple Soap Api Request
        if ($flag) {
            $header = $header->getData();
        }

        $username = $header->username;
        $password = $header->password;

        $validateUser = $this->validateUser($username, $password);
        if (!$validateUser) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::AUTHENTICATION_ERROR
            );
        }

        return $username;
    }

    /**
     * Validate Element coming in the Periodic Table
     * soap Api and the beSimpleSoap Api
     * @param $elementName
     * @throws \SoapFault
     */
    public function validateElementName($elementName, $toBeCreated = 0)
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
        } elseif ($toBeCreated) {
            $atom = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY)
                ->findOneBy(array('elementName' => $elementName));
            if ($atom) {
                throw new \SoapFault(
                    SoapConstants::CLIENT_FAULT_CODE,
                    SoapConstants::ELEMENT_NAME_EXISTS
                );
            }
        }
    }

    /**
     * Validate Atomic Number coming in the Periodic Table api
     * @param $atomicNumber
     * @throws \SoapFault
     */
    public function validateAtomicNumber($atomicNumber)
    {
        if (!$atomicNumber || $atomicNumber === '?') {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::ELEMENT_REQUIRED
            );
        } elseif (!preg_match('/^[0-9].*$/', $atomicNumber)) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::INVALID_ATOMIC_NUMBER
            );
        } else {
            $atom = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY)
                ->findOneBy(array('atomicNumber' => $atomicNumber));
            if ($atom) {
                throw new \SoapFault(
                    SoapConstants::CLIENT_FAULT_CODE,
                    SoapConstants::ATOMIC_NUMBER_EXISTS
                );
            }
        }
    }

    /**
     * Validate Atomic Weight coming in the Periodic Table api
     * @param $atomicWeight
     * @throws \SoapFault
     */
    public function validateAtomicWeight($atomicWeight)
    {
        if (!$atomicWeight || $atomicWeight === '?') {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::ELEMENT_REQUIRED
            );
        } elseif (!preg_match('/^[0-9.].*$/', $atomicWeight)) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::INVALID_ATOMIC_NUMBER
            );
        }
    }


    /**
     * Validate Element Symbol coming in the Periodic Table api
     * @param $elementSymbol
     * @throws \SoapFault
     */
    public function validateElementSymbol($elementSymbol)
    {
        if (!$elementSymbol || $elementSymbol === '?') {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::ELEMENT_REQUIRED
            );
        } elseif (!preg_match('/^[A-Za-z].*$/', $elementSymbol)) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::INVALID_ELEMENT_NAME
            );
        } else {
            $atom = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY)
                ->findOneBy(array('symbol' => $elementSymbol));
            if ($atom) {
                throw new \SoapFault(
                    SoapConstants::CLIENT_FAULT_CODE,
                    SoapConstants::ELEMENT_SYMBOL_EXISTS
                );
            }
        }
    }

    /**
     * Handle CData request coming from the  Create Atom method
     * @param $data
     * @return array
     * @throws \SoapFault
     */
    public function handleCreateAtomRequest($data)
    {
        $keys = array(
            'ElementName',
            'AtomicNumber',
            'AtomicWeight',
            'ElementSymbol'
        );

        $isExist = $this->arrayKeyExists($keys, $data);
        if (!$isExist) {
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::KEY_MISSING
            );
        }
        $elementName = $data['ElementName'];
        $atomicNumber = $data['AtomicNumber'];
        $atomicWeight = $data['AtomicWeight'];
        $elementSymbol = $data['ElementSymbol'];

        $this->validateElementName($elementName, 1);
        $this->validateElementSymbol($elementSymbol);
        $this->validateAtomicNumber($atomicNumber);
        $this->validateAtomicWeight($atomicWeight);

        $atom = new Atom();
        $atom->setElementName($elementName);
        $atom->setAtomicNumber($atomicNumber);
        $atom->setAtomicWeight($atomicWeight);
        $atom->setSymbol($elementSymbol);
        $this->em->persist($atom);
        $this->em->flush();

        return  array(
            'StatusMessage' => 'Element Successfully Created',
            'StatusCode' => '201'
        );
    }

    /**
     * @param array $keys
     * @param array $arr
     * @return bool
     */
    private function arrayKeyExists(array $keys, array $arr)
    {
        return !array_diff_key(array_flip($keys), $arr);
    }
}
