<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class PeriodicTableUtil
{
    private $em;
    private $userIsValid;
    private $securityEncoder;
    private $fosUserManager;


    public function __construct(EntityManager $em, EncoderFactory $encoderFactory, UserManager $userManager)
    {
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

    public function getAtomicNumber($elementName)
    {
        if (! $this->userIsValid) {
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
        return $atom->getAtomicNumber();
    }

    public function getAtoms()
    {
        if (! $this->userIsValid) {
            return new \SoapFault(
                'Client',
                'Kindly provide the correct user credentials'
            );
        }
        $repo = $this->em->getRepository('AppBundle:Atom');
        $atomList = $repo->findAll();
        if (!$atomList) {
            return new \SoapFault('Server', 'No Atom Object Found');
        }
        $resultAtom = array();

        foreach ($atomList as $atom) {
            array_push($resultAtom, $atom->getElementName());
        }
        return $resultAtom;
    }

    public function getAtomicWeight($elementName)
    {
        if (! $this->userIsValid) {
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
        return $atom->getAtomicWeight();
    }


    public function getElementSymbol($elementName)
    {
        if (! $this->userIsValid) {
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
}