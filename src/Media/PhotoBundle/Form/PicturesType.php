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
 * Description of PhotoType
 *
 * @author eningabiye
 */
class PicturesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titre', 'text', array(
                    'label' => "Titre du photo",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('photo', 'file', array(
                    'label' => "Photo",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('alt', 'textarea', array(
                    'label' => "description",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Media\PhotoBundle\Entity\Pictures'
        ));
    }

    public function getName() {
        return 'media_photo_bundle_phototype';
    }

}

?>
