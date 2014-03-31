<?php

namespace G5\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of JobPostulatType
 *
 * @author eningabiye
 */
class JobPostulatType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('cv', 'file', array(
                    'label' => "CV",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('lm', 'file', array(
                    'label' => "Lettre de motivation (pdf)",
                    'required' => true,
                    'attr' => array(
                        'placeholder' => "Tlm",
                        'class' => 'form-control',
                    )
                ))
                ->add('disponibilite', 'textarea', array(
                    'label' => "Disponibilité",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('tel', 'text', array(
                    'label' => "Telephone",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('message', 'textarea', array(
                    'label' => "Message",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'G5\ProjetBundle\Entity\JobPostulat'
        ));
    }

    public function getName() {
        return 'g5_projetbundle_jobpostulattype';
    }

}

?>
