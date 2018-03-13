<?php
/**
 * Atom Entity for defining elements
 *
 * PHP version 7.0.25
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Controller
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Atom
 *
 * @category Entity
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * @ORM\Table(name="atom")
 * @ORM\Entity()
 * @UniqueEntity("atomicNumber")
 * @UniqueEntity("elementName")
 * @UniqueEntity("symbol")
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
     * @Assert\NotBlank(message="The atomic Number cant be blank")
     * @Assert\Regex("/^[0-9].*$/", message="Atomic Number can contain only integers")
     * @ORM\Column(name="atomicNumber", type="integer", unique=true)
     */
    private $atomicNumber;

    /**
     * @var string
     * @Assert\Length(
     *      min = 5,
     *      max = 10,
     *      minMessage = "Element must be at least 5 characters long",
     *      maxMessage = "Element name cannot be longer than 10 characters"
     * )
     * @Assert\Regex("/^[A-Za-z].*$/", message="Element can contain only alphabets")
     * @ORM\Column(name="elementName", type="string", length=40, unique=true)
     */
    private $elementName;

    /**
     * @var string
     * @Assert\Length(
     *      min = 2,
     *      max = 10,
     *      minMessage = "Symbol must be at least 2 characters long",
     *      maxMessage = "Symbol cannot be longer than 10 characters"
     * )
     * @Assert\Regex("/^[A-Za-z].*$/", message="Symbol can contain only alphabets")
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
     * @ORM\ManyToOne(
     *     targetEntity="AppBundle\Entity\User"
     * )
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @var User
     *
     */
    private $owner;

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
     * Owner of atom
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Owner of entity
     * @param User $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
    }
}
