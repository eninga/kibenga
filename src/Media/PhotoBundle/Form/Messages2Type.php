<?php

namespace Media\PhotoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessagesType
 *
 * @author eningabiye
 */
class Messages2Type extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('messages', 'textarea', array(
                    'label' => "Votre message",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Media\PhotoBundle\Entity\Messages'
        ));
    }

    public function getName() {
        return 'media_photo_bundle_messages2';
    }

}

?>
