<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastoTransactionType extends AbstractType
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
            ->add('description','text', array('attr' => array('class' => 'form-control')))
            ->add('concepto','text', array('attr' => array('class' => 'form-control')))
            ->add('monto', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'parsley-type' => 'number',
                    'parsley-max-message' => 'El dinero en casa no es suficiente para realizar la transacción. Monto actual: %s.')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\GastoTransaction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_gastotransaction';
    }
}
