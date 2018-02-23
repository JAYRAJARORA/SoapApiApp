<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

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
            throw new \SoapFault('Server', 'No atom found');
        }
        return $atom->getAtomicNumber();
    }
}