<?php

namespace Beneylu\BeneyluBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InstallType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('date', 'date', array(
                    'data' => new \DateTime()
                ))
                ->add('device', 'entity', array(
                    'class' => 'BeneyluBundle:Device',
                    'choice_label' => 'name'
                ))
                ->add('software', 'entity', array(
                    'class' => 'BeneyluBundle:Software',
                    'choice_label' => 'name'
                ))
                ->add('version', 'entity', array(
                    'class' => 'BeneyluBundle:Version',
                    'choice_label' => 'reference'
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Beneylu\BeneyluBundle\Entity\Install'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'beneylu_beneylubundle_install';
    }

}
