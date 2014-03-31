<?php

namespace Media\VideoBundle\Form;

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
class AlbumType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nom', 'text', array(
            'label' => "Nom de l'album video",
            'required' => true,
            'attr' => array(
                'class' => 'form-control'
            )
        ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Media\VideoBundle\Entity\AlbumVideo'
        ));
    }

    public function getName() {
        return 'media_video_bundle_albumtype';
    }

}

?>
