<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ImmobilierType
 *
 * @author eningabiye
 */
class ImmobilierType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titre', 'text', array(
                    'label' => "Titre de lannonce",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Titre de lannonce",
                        'class' => 'form-control',
                    )
                ))
                ->add('type', 'choice', array(
                    'label' => "Type de contat",
                    'choices' => array('location' => 'Location', 'vente' => 'Vente'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('category', 'choice', array(
                    'label' => "Type de contat",
                    'choices' => array('maison' => 'Maison', 'appart' => 'Appartement', 'immeuble' => 'Immeuble'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('surface', 'text', array(
                    'label' => "Surface",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "m²",
                        'class' => 'form-control',
                    )
                ))
                ->add('pieces', 'text', array(
                    'label' => "Nombre de pièces",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "nombre de pièces",
                        'class' => 'form-control',
                    )
                ))
                ->add('lieu', 'text', array(
                    'label' => "Lieu",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "lieu",
                        'class' => 'form-control',
                    )
                ))
                ->add('prix', 'money', array(
                    'label' => "Prix",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('contact', 'textarea', array(
                    'label' => "Contact (public)",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "",
                        'class' => 'form-control',
                    )
                ))
                ->add('description', 'textarea', array(
                    'label' => "Descripition",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "",
                        'class' => 'form-control',
                    )
                ))

        ;
    }

//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'G5\ProjetBundle\Entity\Immobilier'
//        ));
//    }

    public function getName() {
        return 'g5_projetbundle_immobiliertype';
    }

}

?>
