<?php

namespace SEC\SolicitudesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;

class EnteControlType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre');
    
        
    }


    public function getDefaultOptions(array $options) {


        return array('data_class' => 'SEC\SolicitudesBundle\Entity\EnteControl');
    
    }

    public function getName() {
        return 'EnteControl';
    }

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
