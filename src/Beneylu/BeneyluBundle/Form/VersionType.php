<?php

namespace Beneylu\BeneyluBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VersionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('reference')
                ->add('latest', 'choice', array(
                    'choices' => array(
                        'Yes' => true,
                        'No' => false,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                    'required' => true
                ))
                ->add('software', 'entity', array(
                    'class' => 'BeneyluBundle:Software',
                    'choice_label' => 'name' // MAGIC read next paragraph, it is a private variable
                ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Beneylu\BeneyluBundle\Entity\Version'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'beneylu_beneylubundle_version';
    }

}
