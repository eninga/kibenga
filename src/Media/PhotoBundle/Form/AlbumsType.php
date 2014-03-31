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
 * Description of AlbumsType
 *
 * @author eningabiye
 */
class AlbumsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array(
            'label' => "Nom de l'album",
            'required' => true,
            'attr' => array(
                'class' => 'form-control'
            )
        ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Media\PhotoBundle\Entity\Albums'
        ));
    }

    public function getName() {
        return 'media_photo_bundle_albumtype';
    }

}

?>
