<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of AnnonceReponseType
 *
 * @author eningabiye
 */
class AnnonceReponseType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('reponse', 'textarea', array(
            'label' => "Ecrivez votre réponse",
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
//            'data_class' => 'G5\ProjetBundle\Entity\AnnonceReponse'
//        ));
//    }

    public function getName() {
        return 'g5_projetbundle_annoncereponsetype';
    }

}

?>
