<?php

namespace AppBundle\Form;

use AppBundle\Entity\Atom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
              'label' => 'Atomic Number',
              'attr' => array(
                  'placeholder' => 'Enter Atomic Number',
                  'class'=> 'form-control'
              )
          )
        )->add(
          'atomicWeight', NumberType::class,
            array(
                'label' => 'Atomic Weight',
                'attr' => array(
                    'placeholder' => 'Enter Atomic Weight',
                    'class'=> 'form-control'
                )
            )
        )->add(
            'elementName', TextType::class,
            array(
                'label' => 'Element Name',
                'attr' => array(
                    'placeholder' => 'Enter Element Name',
                    'class'=> 'form-control'
                )
            )
        )->add(
            'symbol', TextType::class,
            array(
                'label' => 'Symbol',
                'attr' => array(
                    'placeholder' => 'Enter Element symbol',
                    'class'=> 'form-control'
                )
            )
        )->add(
            'boilingPoint', NumberType::class,
            array(
                'label' => 'Boiling Point',
                'attr' => array(
                    'placeholder' => 'Enter Boiling Point',
                    'class'=> 'form-control'
                )
            )
        )->add(
            'meltingPoint', NumberType::class,
            array(
                'label' => 'Melting Point',
                'attr' => array(
                    'placeholder' => 'Enter Melting Point',
                    'class'=> 'form-control'
                )
            )
        )->add(
            'density',IntegerType::class,
            array(
                'label' => 'Density',
                'attr' => array(
                    'placeholder' => 'Enter Density',
                    'class'=> 'form-control'
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