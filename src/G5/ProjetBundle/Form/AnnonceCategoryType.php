<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of AnnonceCategoryType
 *
 * @author eningabiye
 */
class AnnonceCategoryType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nom', 'text', array(
                    'label' => "nom de la category",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('description', 'textarea', array(
                    'label' => "Description",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'G5\ProjetBundle\Entity\AnnonceCategory'
        ));
    }

    public function getName() {
        return 'g5_projetbundle_annoncecategorytype';
    }

}
