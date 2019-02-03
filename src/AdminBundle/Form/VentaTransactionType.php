<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VentaTransactionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaHora', 'datetime', array(
                'widget' => 'single_text',
                'read_only' => true,
                'attr' => array('class' => 'form-control')
            ))
            ->add('deuda', 'number', array('attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('precioventa', 'number', array(
                'attr' => array('class' => 'form-control', 'parsley-type' => 'number', 'parsley-min' => '0')))
            ->add('cantidadventa','integer', array(
                'attr' => array(
                    'class' => 'form-control', 'parsley-min' => '0', 'parsley-max' => '0',
                    'parsley-max-message' => 'La cantidad de móviles debe ser menor o igual a %s.'
                    )))
            ->add('comprador','text', array('attr' => array('class' => 'form-control')))
        ;

        if ($options['obj'] == 'miscelanea') {
            $builder
                ->add('objeto', 'entity', array(
                    'class' => 'AdminBundle\Entity\Miscelanea',
                    'empty_value' => 'Seleccione la miscelánea',
                    'attr' => array('class' => 'form-control show-menu-arrow', 'data-live-search' => true)
                ))
            ;
        } elseif ($options['obj'] == 'movil') {
            $builder
                ->add('objeto', 'entity', array(
                    'class' => 'AdminBundle\Entity\Movil',
                    'empty_value' => 'Seleccione el móvil',
                    'attr' => array('class' => 'form-control show-menu-arrow', 'data-live-search' => true)
                ))
            ;
        }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\VentaTransaction',
            'obj' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_ventatransaction';
    }
}
