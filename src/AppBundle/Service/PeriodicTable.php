<?php
/**
 * Service containing all the soap methods to handle requests
 *
 * @category  Service
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Service;

use AppBundle\Constants\SoapConstants;
use AppBundle\Entity\Atom;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use AppBundle\Util\DomUtil;
use AppBundle\Util\AtomUtil;

/**
 * Class PeriodicTable
 *
 * @category Service
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class PeriodicTable
{
    private $em;
    private $logger;
    private $validator;
    private $username;

    /**
     * PeriodicTableUtil constructor.
     * @param EntityManager $em
     * @param Logger $logger
     * @param Validator $atomValidator
     */
    public function __construct(
        EntityManager $em,
        Logger $logger,
        Validator $atomValidator
    ) {
        $this->logger = $logger;
        $this->em = $em;
        $this->validator = $atomValidator;
    }

    /**
     * Authentication Header method for checking the username and password
     * @param $header
     * @throws \SoapFault
     */
    public function checkAuth($header)
    {
        $this->username = $this->validator->validateHeader($header, 0);
    }
    /**
     * Soap Method for fetching atomicNumber
     * @param $elementName
     * @return string
     * @throws \SoapFault
     */
    public function getAtomicNumber($elementName, $username = null)
    {
        $this->validator->validateElementName($elementName);
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(SoapConstants::ELEMENT_NAME => $elementName)
        );
        AtomUtil::checkOwner($atom->getOwner()->getUsername(), ($username ? $username : $this->username));
        AtomUtil::isAtomExist($atom);

        return $atom->getAtomicNumber();
    }

    /**
     * Soap Method for fetching atoms
     * @return array
     * @throws \SoapFault
     */
    public function getAtoms()
    {
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
     * Soap Method for fetching atomicWeight
     * @param $elementName
     * @return string
     * @throws \SoapFault
     */
    public function getAtomicWeight($elementName, $username = null)
    {
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(SoapConstants::ELEMENT_NAME => $elementName)
        );
        AtomUtil::isAtomExist($atom);
        AtomUtil::checkOwner($atom->getOwner()->getUsername(), ($username ? $username : $this->username));

        return $atom->getAtomicWeight();
    }

    /**
     * Soap Method for fetching ElementSymbol
     * @param $elementName
     * @return string
     * @throws \SoapFault
     */
    public function getElementSymbol($elementName)
    {
        $repo = $this->em->getRepository(SoapConstants::ATOM_REPOSITORY);
        $atom = $repo->findOneBy(
            array(SoapConstants::ELEMENT_NAME => $elementName)
        );
        AtomUtil::isAtomExist($atom);

        return $atom->getSymbol();
    }


    /**
     * Soap Method for fetching details of element
     * @param $elementName
     * @return array
     * @throws \SoapFault
     */
    public function getAtomDetails($elementName)
    {
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
     * @return string
     * @throws \SoapFault
     */
    public function createAtomUsingCData($cdata)
    {
        libxml_use_internal_errors(true);

        $cc = simplexml_load_string(trim($cdata));
        if (!$cc) {
            libxml_clear_errors();
            throw new \SoapFault(
                SoapConstants::CLIENT_FAULT_CODE,
                SoapConstants::INVALID_XML
            );
        }
        $data = (array)($cc);
        $this->logger->debug(
            'CDataSection',
            array($cc->getName() => $data)
        );
        $root = 'CreateAtomResponse';
        $nodes = $this->validator->handleCreateAtomRequest($data);
        return DomUtil::createXml($root, $nodes);
    }
}
