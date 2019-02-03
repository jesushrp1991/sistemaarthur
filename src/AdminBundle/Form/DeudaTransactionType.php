<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeudaTransactionType extends AbstractType
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
            ->add('concepto','text', array(
                'attr' => array('class' => 'form-control'),
                'read_only' => true
            ))
            ->add('descripcion','text', array(
                'attr' => array('class' => 'form-control'),
                'read_only' => true
            ))
            ->add('deudor','text', array(
                'attr' => array('class' => 'form-control'),
                'read_only' => true
            ))
            ->add('montoinicial', 'number', array(
                'read_only' => true,
                'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('montorestante', 'number', array('attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\DeudaTransaction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_deudatransaction';
    }
}
