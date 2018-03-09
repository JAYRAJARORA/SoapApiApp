<?php

namespace AppBundle\Form;

use AppBundle\Entity\Atom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Constants\SoapConstants;

class AtomType extends AbstractType
{
    public function getName()
    {
        return 'Atom';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
          'atomicNumber',IntegerType::class,
          array(
              SoapConstants::ATOM_FORM_LABEL => 'Atomic Number',
              SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                  SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Atomic Number',
                  SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
              )
          )
        )->add(
          'atomicWeight', NumberType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Atomic Weight',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Atomic Weight',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'elementName', TextType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Element Name',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Element Name',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'symbol', TextType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Symbol',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Element symbol',
                     SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'boilingPoint', NumberType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Boiling Point',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Boiling Point',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'meltingPoint', NumberType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Melting Point',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Melting Point',
                    SoapConstants::ATOM_FORM_CLASS => SoapConstants::ATOM_FORM_FORM_CONTROL
                )
            )
        )->add(
            'density',IntegerType::class,
            array(
                SoapConstants::ATOM_FORM_LABEL => 'Density',
                SoapConstants::ATOM_FORM_ATTRIBUTE => array(
                    SoapConstants::ATOM_FORM_PLACEHOLDER => 'Enter Density',
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