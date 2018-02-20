<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atom
 *
 * @ORM\Table(name="atom")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AtomRepository")
 */
class Atom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="atomicNumber", type="integer", unique=true)
     */
    private $atomicNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="elementName", type="string", length=40, unique=true)
     */
    private $elementName;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=10, unique=true)
     */
    private $symbol;

    /**
     * @var string
     *
     * @ORM\Column(name="atomicWeight", type="decimal", precision=8, scale=2)
     */
    private $atomicWeight;

    /**
     * @var string
     *
     * @ORM\Column(name="atomicRadius", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $atomicRadius;

    /**
     * @var string
     *
     * @ORM\Column(name="meltingPoint", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $meltingPoint;

    /**
     * @var string
     *
     * @ORM\Column(name="boilingPoint", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $boilingPoint;

    /**
     * @var int
     *
     * @ORM\Column(name="density", type="integer", nullable=true)
     */
    private $density;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set atomicNumber
     *
     * @param integer $atomicNumber
     * @return Atom
     */
    public function setAtomicNumber($atomicNumber)
    {
        $this->atomicNumber = $atomicNumber;

        return $this;
    }

    /**
     * Get atomicNumber
     *
     * @return integer 
     */
    public function getAtomicNumber()
    {
        return $this->atomicNumber;
    }

    /**
     * Set elementName
     *
     * @param string $elementName
     * @return Atom
     */
    public function setElementName($elementName)
    {
        $this->elementName = $elementName;

        return $this;
    }

    /**
     * Get elementName
     *
     * @return string 
     */
    public function getElementName()
    {
        return $this->elementName;
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     * @return Atom
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string 
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set atomicWeight
     *
     * @param string $atomicWeight
     * @return Atom
     */
    public function setAtomicWeight($atomicWeight)
    {
        $this->atomicWeight = $atomicWeight;

        return $this;
    }

    /**
     * Get atomicWeight
     *
     * @return string 
     */
    public function getAtomicWeight()
    {
        return $this->atomicWeight;
    }

    /**
     * Set atomicRadius
     *
     * @param string $atomicRadius
     * @return Atom
     */
    public function setAtomicRadius($atomicRadius)
    {
        $this->atomicRadius = $atomicRadius;

        return $this;
    }

    /**
     * Get atomicRadius
     *
     * @return string 
     */
    public function getAtomicRadius()
    {
        return $this->atomicRadius;
    }

    /**
     * Set meltingPoint
     *
     * @param string $meltingPoint
     * @return Atom
     */
    public function setMeltingPoint($meltingPoint)
    {
        $this->meltingPoint = $meltingPoint;

        return $this;
    }

    /**
     * Get meltingPoint
     *
     * @return string 
     */
    public function getMeltingPoint()
    {
        return $this->meltingPoint;
    }

    /**
     * Set boilingPoint
     *
     * @param string $boilingPoint
     * @return Atom
     */
    public function setBoilingPoint($boilingPoint)
    {
        $this->boilingPoint = $boilingPoint;

        return $this;
    }

    /**
     * Get boilingPoint
     *
     * @return string 
     */
    public function getBoilingPoint()
    {
        return $this->boilingPoint;
    }

    /**
     * Set density
     *
     * @param integer $density
     * @return Atom
     */
    public function setDensity($density)
    {
        $this->density = $density;

        return $this;
    }

    /**
     * Get density
     *
     * @return integer 
     */
    public function getDensity()
    {
        return $this->density;
    }
}
