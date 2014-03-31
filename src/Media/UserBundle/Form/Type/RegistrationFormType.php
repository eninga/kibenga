<?php

namespace Media\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);

        $builder->add('lastName', 'text', array(
                    'label' => "Prénom (optionnel)",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('firstName', 'text', array(
                    'label' => "Nom (optionnel)",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
        ;
    }

    public function getName() {
        return "media_userbundle_registrationtype";
    }

}
