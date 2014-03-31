<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of AnnonceImagesType
 *
 * @author eningabiye
 */
class AnnonceImagesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('photo', 'file', array(
                    'label' => "Titre de lannonce",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Titre de lannonce",
                        'class' => 'form-control',
                    )
                ))
                ->add('alt', 'textarea', array(
                    'label' => "Descripition",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "texte alternatif",
                        'class' => 'form-control',
                    )
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'G5\ProjetBundle\Entity\AnnonceImages'
        ));
    }

    public function getName() {
        return 'g5_projetbundle_annonceimagestype';
    }

}

?>
