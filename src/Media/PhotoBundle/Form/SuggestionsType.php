<?php

namespace Foot\ClubFootBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuggestionsType
 *
 * @author eningabiye
 */
class SuggestionsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('suggestions', 'textarea', array(
                    'label' => "Votre suggestion",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Foot\ClubFootBundle\Entity\Suggestions'
        ));
    }

    public function getName() {
        return 'foot_club_foot_bundle_suggestionstype';
    }

}

?>


