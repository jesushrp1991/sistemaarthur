<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MiscelaneaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('precioventa', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('preciocompra', 'number', array('required' => false, 'attr' => array('class' => 'form-control', 'parsley-type' => 'number')))
            ->add('descripcion', 'text', array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('especificaciones', 'entity', array(
                'class' => 'AdminBundle\Entity\Especificacion',
                'empty_value' => 'Seleccione una especificación',
                'attr' => array('class' => 'form-control show-menu-arrow', 'data-live-search' => true)))
            ->add('categoria', 'entity', array(
                'mapped' => false,
                'empty_value' => 'Seleccione una categoría',
                'class' => 'AdminBundle\Entity\Categoria',
                'attr' => array('class' => 'form-control show-menu-arrow', 'data-live-search' => true)))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Miscelanea'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_miscelanea';
    }
}
