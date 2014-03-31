<?php
namespace Media\VideoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotoType
 *
 * @author eningabiye
 */
class VideoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titre', 'text', array(
                    'label' => "Titre de la video",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                ))
                ->add('video', 'file', array(
                    'label' => "Video",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
                ->add('description', 'textarea', array(
                    'label' => "description",
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                    )
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Media\VideoBundle\Entity\Videos'
        ));
    }

    public function getName() {
        return 'media_vido_bundle_phototype';
    }

}

?>
