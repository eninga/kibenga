<?php

namespace Media\PhotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CommentsType
 *
 * @author eningabiye
 */
class CommentsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('comment', 'textarea', array(
                    'label' => "Votre commentaire",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
              
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Foot\ClubFootBundle\Entity\Comments'
        ));
    }

    public function getName() {
        return 'foot_club_foot_bundle_commenttype';
    }

}

?>

