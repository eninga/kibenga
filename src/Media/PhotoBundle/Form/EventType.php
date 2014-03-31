<?php

namespace Foot\ClubFootBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of EventType
 *
 * @author eningabiye
 */

class EventType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titre', 'text', array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Titre de l'événement",
                        'class' => 'form-control',
                    )
                ))
                //->add('auteur', 'hidden')
                /*    ->add('photo', 'file', array(
                  'attr' => array(
                  'class' => 'form-control'
                  )
                  ))
                 */
                ->add('description', 'textarea', array(
                    'label' => "Description de l'événement",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('lieu', 'text', array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Lieu de l'événement",
                        'class' => 'form-control',
                    )
                ))
                ->add('date_begining', 'date', array(
                    'label' => 'Date de début',
                    'required' => false,
                    'widget' => 'choice',
                    'format' => 'dd-MM-yyyy',
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('heure_begin', 'time', array(
                    'label' => 'Heure de début',
                    'required' => false,
                    'widget' => 'choice',
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('date_end', 'date', array(
                    'label' => 'Date de fin',
                    'required' => false,
                    'widget' => 'choice',
                    'format' => 'dd-MM-yyyy',
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('heure_end', 'time', array(
                    'label' => 'Heure de fin',
                    'required' => false,
                    'input' => 'datetime',
                    'widget' => 'choice',
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Foot\ClubFootBundle\Entity\Event'
        ));
    }

    public function getName() {
        return 'foot_club_foot_bundle_eventtype';
    }

}

?>
<?php


