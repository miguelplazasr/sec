<?php

namespace SEC\SolicitudesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsignacionType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('fechaEnvio', null);
        
    
        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        
        $resolver->setDefaults(array(
            'data_class' => 'SEC\SolicitudesBundle\Entity\Asignacion'));
    }

    public function getName() {
        return 'asignacion';
    }

}

?>
