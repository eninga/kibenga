<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of DiversType
 *
 * @author eningabiye
 */
class DiversType extends AbstractType {

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
                    'choices' => array('location' => 'Location', 'vente' => 'Vente','autres'=>'Autres'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('category', 'choice', array(
                    'label' => "Catégorie",
                    'choices' => array('multimedia' => 'Multimedia', 'service' => 'Service', 'evenement' => 'Evénemnet',
                        'loisir'=>'Loisir','autres'=>'Autres'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('prix', 'text', array(
                    'label' => "Prix",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
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
                ->add('lieu', 'text', array(
                    'label' => "Lieu",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "prix",
                        'class' => 'form-control',
                    )
                ))
                ->add('contact', 'text', array(
                    'label' => "Contact",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "contact (200 caractères)",
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

//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'G5\ProjetBundle\Entity\Divers'
//        ));
//    }

    public function getName() {
        return 'g5_projetbundle_diverstype';
    }

}

?>
