<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use Monolog\Logger;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class PeriodicTableUtil
{
    private $em;
    private $userIsValid;
    private $securityEncoder;
    private $fosUserManager;
    private $logger;

    public function __construct(EntityManager $em, EncoderFactory $encoderFactory, UserManager $userManager, Logger $logger)
    {
        $this->logger = $logger;
        $this->em = $em;
        $this->securityEncoder = $encoderFactory;
        $this->fosUserManager = $userManager;
    }

    public function checkAuth($header)
    {
        if ((isset($header->username)) && (isset($header->password))) {
            if ($this->validateUser($header->username, $header->password)) {
                $this->userIsValid = true;
            }
        }
    }

    public function validateUser($username, $password)
    {
        $user = $this->fosUserManager->findUserByUsername($username);
        if (!$user) {
            return false;
        }
        $encoder = $this->securityEncoder->getEncoder($user);
        $salt = $user->getSalt();

        if ($encoder->isPasswordValid($user->getPassword(), $password, $salt)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAtomicNumber($elementName, $flag=0)
    {
        if (! $this->userIsValid && !$flag) {
            return new \SoapFault(
                'Client',
                'Kindly provide the correct user credentials'
            );
        }
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
            'elementName' => $elementName
            )
        );
        if (!$atom) {
            throw new \SoapFault('Server', 'No Atom Object Found');
        }
        return $atom->getAtomicNumber();
    }

    public function getAtoms($flag=0)
    {
        if (! $this->userIsValid && !$flag) {
            return new \SoapFault(
                'Client',
                'Kindly provide the correct user credentials'
            );
        }
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atomList = $repo->findAll();
        if (!$atomList) {
            throw new \SoapFault('Server', 'No Atom Object Found');
        }
        $resultAtom = array();

        foreach ($atomList as $atom) {
            array_push($resultAtom, $atom->getElementName());
        }
        return $resultAtom;
    }

    public function getAtomicWeight($elementName, $flag=0)
    {
        if (! $this->userIsValid && !$flag) {
            return new \SoapFault(
                'Client',
                'Kindly provide the correct user credentials'
            );
        }
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
            'elementName' => $elementName
            )
        );
        if (!$atom) {
            throw new \SoapFault('Server', 'No Atom Object Found');
        }
        return $atom->getAtomicWeight();
    }


    public function getElementSymbol($elementName, $flag=0)
    {
        if (! $this->userIsValid && !$flag) {
            return new \SoapFault(
                'Client',
                'Kindly provide the correct user credentials'
            );
        }
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atom = $repo->findOneBy(
            array(
                'elementName' => $elementName
            )
        );
        if (!$atom) {
            return new \SoapFault('Server', 'No Atom Object Found');
        }
        return $atom->getSymbol();
    }

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
        $response = $this->createXml($root, $nodes);
        return $response;
    }

    public function createXml($root, $nodes)
    {
        $document = new \DOMDocument();
        $root = $document->appendChild(
            $document->createElement(
                $root
            )
        );
        foreach ($nodes as $node => $nodeText) {
            $resultantNode = $root->appendChild(
                $document->createElement(
                    $node
                )
            );
            if ($nodeText) {
                $resultantNode->appendChild(
                    $document->createTextNode(
                        $nodeText
                    )
                );
            }
        }
        $response = $document->saveXML();

        return $response;
    }
}