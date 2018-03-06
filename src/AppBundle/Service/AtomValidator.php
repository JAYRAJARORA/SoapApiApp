<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Constants\SoapConstants;

class AtomValidator
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param $atomicNumber
     * @throws \SoapFault
     */
    public function getAtomicNumber($elementName)
    {
        $atom = $this->em->getRepository('AppBundle:Atom')
            ->findOneBy(array('elementName'=> $elementName));
        if (!$atom) {
            throw new \SoapFault(
                SoapConstants::SERVER_FAULT_CODE,
                SoapConstants::OBJECT_NOT_FOUND
            );
        }
        return $atom->getAtomicNumber();
    }
}