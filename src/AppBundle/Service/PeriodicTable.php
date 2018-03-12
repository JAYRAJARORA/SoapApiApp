<?php

namespace AppBundle\Service;

use AppBundle\Constants\SoapConstants;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;

use AppBundle\Util\DomUtil;
use AppBundle\Util\AtomUtil;

class PeriodicTableUtil
{
    private $em;
    private $userIsValid;
    private $logger;
    private $atomValidator;

    /**
     * PeriodicTableUtil constructor.
     * @param EntityManager $em
     * @param Logger $logger
     * @param AtomValidator $atomValidator
     */
    public function __construct(
        EntityManager $em,
        Logger $logger,
        AtomValidator $atomValidator
    ) {
        $this->logger = $logger;
        $this->em = $em;
        $this->atomValidator = $atomValidator;
    }

    /**
     * @param $header
     */
    public function checkAuth($header)
    {

        if ((isset($header->username))
            && (isset($header->password))
            && $this->atomValidator->validateUser($header->username, $header->password)
        ) {
                $this->userIsValid = true;
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

        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(
            SoapConstants::ELEMENT_NAME => $elementName
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
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
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
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(
            SoapConstants::ELEMENT_NAME => $elementName
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
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(
                SoapConstants::ELEMENT_NAME => $elementName
            )
        );
        AtomUtil::isAtomExist($atom);

        return $atom->getSymbol();
    }


    /**
     * @param $elementName
     * @param int $flag
     * @return mixed
     * @throws \SoapFault
     */
    public function getAtomDetails($elementName, $flag = 0)
    {
        AtomUtil::isUserValid($this->userIsValid, $flag);

        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(
                SoapConstants::ELEMENT_NAME => $elementName
            )
        );
        AtomUtil::isAtomExist($atom);

        return array(
            'status' => 'Element found with name '.$elementName,
            'AtomicNumber' => $atom->getAtomicNumber(),
            'AtomicWeight' => $atom->getAtomicWeight(),
            'ElementSymbol' => $atom->getSymbol()
        );
    }

    /**
     * @param $cdata
     * @param $testData
     * @return string
     */
    public function handleCData($cdata)
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
        return DomUtil::createXml($root, $nodes);
    }
}