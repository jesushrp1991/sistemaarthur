<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompraTransactionType extends AbstractType
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
            ->add('preciocompra', 'number', array('attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('cantidadcomprada','integer', array('attr' => array('class' => 'form-control')))
            ->add('proveedor','text', array('attr' => array('class' => 'form-control')))
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
            'data_class' => 'AdminBundle\Entity\CompraTransaction',
            'obj' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_compratransaction';
    }
}
