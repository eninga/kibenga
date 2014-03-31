<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('category', 'entity', array(
                    'label' => "Catégorie",
                    'empty_value' => 'Choisissez une catégorie',
                    'class' => 'G5ProjetBundle:JobCategory',
                    'property' => 'nom',
                    'attr' => array('class' => 'form-control')
                ))
                ->add('titre', 'text', array(
                    'label' => "Titre de lannonce",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Titre de lannonce",
                        'class' => 'form-control',
                    )
                ))
                ->add('presentation', 'textarea', array(
                    'label' => "Présentation de l'entreprise",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('mission', 'textarea', array(
                    'label' => "Mission",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('profil', 'textarea', array(
                    'label' => "Profil du candidat",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('contrat', 'choice', array(
                    'label' => "Type de contat",
                    'choices' => array('cdi' => 'CDI', 'cdd' => 'CDD', 'stage' => 'STAGE'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('debut', 'text', array(
                    'label' => "Début de la mission",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('region', 'text', array(
                    'label' => "Région",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('pays', 'text', array(
                    'label' => "Pays",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('secteur', 'choice', array(
                    'label' => "Secteur",
                    'choices' => array('informatique' => 'info', 'math' => 'mathematique'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('remuneration', 'text', array(
                    'label' => "Remuneration",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                  ->add('adresse', 'textarea', array(
                    'label' => "Adresse",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                  ->add('contact', 'textarea', array(
                    'label' => "Contact",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                  ->add('autres', 'textarea', array(
                    'label' => "Autres précisions",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))



        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'G5\ProjetBundle\Entity\Jobs'
        ));
    }

    public function getName() {
        return 'g5_projetbundle_jobtype';
    }

}

?>
