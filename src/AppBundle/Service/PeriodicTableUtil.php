<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use Monolog\Logger;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use AppBundle\Util\DomUtil;
use AppBundle\Util\AtomUtil;

class PeriodicTableUtil
{
    private $em;
    private $userIsValid;
    private $securityEncoder;
    private $fosUserManager;
    private $logger;

    /**
     * PeriodicTableUtil constructor.
     * @param EntityManager $em
     * @param EncoderFactory $encoderFactory
     * @param UserManager $userManager
     * @param Logger $logger
     */
    public function __construct(
        EntityManager $em,
        EncoderFactory $encoderFactory,
        UserManager $userManager,
        Logger $logger
    ) {
        $this->logger = $logger;
        $this->em = $em;
        $this->securityEncoder = $encoderFactory;
        $this->fosUserManager = $userManager;
    }

    /**
     * @param $header
     */
    public function checkAuth($header)
    {
        if ((isset($header->username)) && (isset($header->password))) {
            if ($this->validateUser($header->username, $header->password)) {
                $this->userIsValid = true;
            }
        }
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

        if ($encoder->isPasswordValid(
            $user->getPassword(),
            $password,
            $salt
        )) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $elementName
     * @param int $flag
     * @return mixed
     * @throws \SoapFault
     */
    public function getAtomicNumber($elementName, $flag = 0)
    {
        AtomUtil::isUserValid($this->userIsValid, $flag);

        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
            'elementName' => $elementName
            )
        );
        AtomUtil::isAtomExist($atom);
        return $atom->getAtomicNumber();
    }

    /**
     * @param int $flag
     * @return array
     * @throws \SoapFault
     */
    public function getAtoms($flag = 0)
    {
        AtomUtil::isUserValid($this->userIsValid, $flag);
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atomList = $repo->findAll();

        AtomUtil::isAtomExist($atomList);
        $resultAtom = array();

        foreach ($atomList as $atom) {
            array_push($resultAtom, $atom->getElementName());
        }
        return $resultAtom;
    }

    /**
     * @param $elementName
     * @param int $flag
     * @return mixed
     * @throws \SoapFault
     */
    public function getAtomicWeight($elementName, $flag = 0)
    {
        AtomUtil::isUserValid($this->userIsValid, $flag);
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
            'elementName' => $elementName
            )
        );
        AtomUtil::isAtomExist($atom);

        return $atom->getAtomicWeight();
    }

    /**
     * @param $elementName
     * @param int $flag
     * @return mixed
     * @throws \SoapFault
     */
    public function getElementSymbol($elementName, $flag=0)
    {
        AtomUtil::isUserValid($this->userIsValid, $flag);
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
                'elementName' => $elementName
            )
        );
        AtomUtil::isAtomExist($atom);

        return $atom->getSymbol();
    }

    /**
     * @param $cdata
     * @param $testData
     * @return string
     */
    public function handleCData($cdata, $testData)
    {
        $cc = simplexml_load_string(trim($cdata));
        $data = json_decode(json_encode($cc), true);
        $this->logger->debug(
            'CDataSection',
            array($cc->getName() => $data)
        );
        $root = 'VerifyAccountReturn';
        $nodes = array();
        $nodes['returnCode'] = '1';
        $nodes['errorCode'] = '';
        $nodes['subsriberFound'] = '2';
        $nodes['numContact'] = '121212';
        $nodes['amount'] = '121';
        $nodes['currency'] = 'INR';
        $response = DomUtil::createXml($root, $nodes);
        return $response;
    }
}