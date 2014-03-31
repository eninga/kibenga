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
class MessagesType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('destinataire', 'entity', array(
                    'empty_value' => 'Choisissez un destinataire',
                    'class' => 'MediaUserBundle:User',
                    'property' => 'username',
                    'label' => "A",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('objet', 'text', array(
                    'label' => "Objet",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('messages', 'textarea', array(
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
        return 'media_photo_bundle_messages';
    }

}

?>
