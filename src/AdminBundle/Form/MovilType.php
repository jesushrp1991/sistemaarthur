<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('precioventa', 'number', array('attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('preciocompra', 'number', array('attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('marca','text', array('attr' => array('class' => 'form-control')))
            ->add('modelo','text', array('attr' => array('class' => 'form-control')))
            ->add('frontmpcam', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('backmpcam', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('androidversion', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('sensorhuella','checkbox', array('required' => false))
            ->add('cpu','text', array('attr' => array('class' => 'form-control')))
            ->add('cpucores','integer', array('attr' => array('class' => 'form-control')))
            ->add('cpuspeed', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('baterycapmah','integer', array('attr' => array('class' => 'form-control')))
            ->add('baterycargarapida','checkbox', array('required' => false))
            ->add('baterycargainalambrica','checkbox', array('required' => false))
            ->add('ram', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('almacenamiento','integer', array('attr' => array('class' => 'form-control')))
            ->add('microsd','integer', array('attr' => array('class' => 'form-control')))
            ->add('screenresolutionwidth','integer', array('attr' => array('class' => 'form-control')))
            ->add('screenresolutionheight','integer', array('attr' => array('class' => 'form-control')))
            ->add('screentipo','text', array('attr' => array('class' => 'form-control')))
            ->add('screensize', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('screenprotection','text', array('attr' => array('class' => 'form-control')))
            ->add('screendensity','integer', array('attr' => array('class' => 'form-control')))
            ->add('accesoriocable','checkbox', array('required' => false))
            ->add('accesoriocargador','checkbox', array('required' => false))
            ->add('accesoriomanoslibres','checkbox', array('required' => false))
            ->add('waterresistant','checkbox', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Movil'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_movil';
    }
}
