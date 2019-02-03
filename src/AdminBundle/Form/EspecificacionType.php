<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EspecificacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text', array('attr' => array('class' => 'form-control')))
            ->add('categoria', 'entity', array(
                'class' => 'AdminBundle\Entity\Categoria',
                'attr' => array('class' => 'form-control show-menu-arrow', 'data-live-search' => true)
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Especificacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_especificacion';
    }
}
