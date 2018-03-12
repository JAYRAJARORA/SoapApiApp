<?php
/**
 * Atom Form Type for creating elements for testing soap Apis
 *
 * PHP version 7.0.25
 * LICENSE: This program is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @category  Form
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 * @copyright 1997-2005 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 */
namespace AppBundle\Form;

use AppBundle\Entity\Atom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Constants\SoapConstants;

/**
 * Class AtomType
 *
 * @category FormType
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 */
class AtomType extends AbstractType
{
    /**
     * Form Builder for the creation of atom
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'atomicNumber',
            IntegerType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Atomic Number',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Atomic Number',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'atomicWeight',
            NumberType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Atomic Weight',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Atomic Weight',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'elementName',
            TextType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Element Name',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Element Name',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'symbol',
            TextType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Symbol',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Element symbol',
                     SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        );
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => Atom::class
            )
        );
    }
}
