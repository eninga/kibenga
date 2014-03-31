<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobCategoryType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', 'text')
                ->add('description', 'textarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'G5\ProjetBundle\Entity\JobCategory'
        ));
    }

    public function getName() {
        return 'g5_projetbundle_jobcategorytype';
    }

}
