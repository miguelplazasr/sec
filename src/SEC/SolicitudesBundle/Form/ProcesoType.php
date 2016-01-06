<?php

namespace SEC\SolicitudesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcesoType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('tipo', 'entity', array(
            'class' =>  'SECSolicitudesBundle:Tipo',
            'property'  =>  'descripcion',
            'empty_value'   => 'Seleccione...'
        ))
        ->add('fechaRecSDA', 'date', array(
            'label' =>  'Fecha Recepción SDA : ',
            'widget'    =>  'single_text',
        ))
                ->add('fechaRecSER', 'date', array(
            'label' =>  'Fecha Recepción SER : ',
            'widget'    =>  'single_text',
        ))
                ->add('titulo')
                ->add('resumen', 'textarea', array(
                    'label' => 'Resumen'
                ))
                ->add('infoadicional')
                ->add('noradicado')
                ->add('entecontrol', 'entity', array(
                    'class' => 'SECSolicitudesBundle:EnteControl',
                    'property' => 'nombre',
                    'empty_value' => 'Seleccione...'
                ))
                ->add('diasrespuesta')
                ->add('fechamaxrespuesta', 'date', array(
            'label' =>  'Fecha Maxima : ',
            'widget'    =>  'single_text',
                    'format' => 'dd/MM/yyyy',
                    'read_only' => true
        ))
                
                ->add('alerta1', 'date', array(
            'label' =>  'Alerta 1 : ',
            'widget'    =>  'single_text',
                    'format' => 'dd/MM/yyyy',
                    'read_only' => true
        ))
                
                ->add('alerta2', 'date', array(
            'label' =>  'Alerta 2 : ',
            'widget'    =>  'single_text',
                    'format' => 'dd/MM/yyyy',
                    'read_only' => true
        ))
                ->add('asignaciones', 'collection', array(
                    'type' => new AsignacionType(),
                    'label' => 'Responsables',
                    'by_reference' => false,
                    //'prototype_data' => new Asignacion(),
                    'allow_delete' => true,
                    'allow_add' => true,
                    
                ))
                ;
    
    
        
    }
    
        public function setDefaultOptions(OptionsResolverInterface $resolver) {
        
        $resolver->setDefaults(array(
            'data_class' => 'SEC\SolicitudesBundle\Entity\Proceso'
        ));
    }

    public function getName() {
        return 'proceso_asignaciones';
    }

}

?>
