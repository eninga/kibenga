<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of VehiculeType
 *
 * @author eningabiye
 */
class VehiculeType extends AbstractType {

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
                    'label' => "Type de ",
                    'choices' => array('location' => 'Location', 'vente' => 'Vente'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('category', 'choice', array(
                    'label' => "Catégorie",
                    'choices' => array('voiture' => 'Voiture', 'moto' => 'Moto', 'camion' => 'Camion'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('marque', 'text', array(
                    'label' => "Marque",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "marque",
                        'class' => 'form-control',
                    )
                ))
                ->add('etat', 'text', array(
                    'label' => "Etat de la voiture",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "état",
                        'class' => 'form-control',
                    )
                ))
                ->add('energie', 'text', array(
                    'label' => "Energie",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "energie",
                        'class' => 'form-control',
                    )
                ))
                ->add('annee', 'text', array(
                    'label' => "Année de fabrication",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('km', 'text', array(
                    'label' => "Kilométrage",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('places', 'text', array(
                    'label' => "Places",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('lieu', 'text', array(
                    'label' => "Lieu",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('contact', 'textarea', array(
                    'label' => "Contact",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "",
                        'class' => 'form-control',
                    )
                ))
                ->add('prix', 'float', array(
                    'label' => "Prix",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('description', 'textarea', array(
                    'label' => "Descripition",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "description",
                        'class' => 'form-control',
                    )
                ))

        ;
    }

   

    public function getName() {
        return 'g5_projetbundle_vehiculetype';
    }

}

?>
