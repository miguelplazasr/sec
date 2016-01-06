<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SEC\SolicitudesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SEC\SolicitudesBundle\Entity\Persona
 *
 * @ORM\Table(name="tb_persona")
 * @ORM\Entity(repositoryClass="SEC\SolicitudesBundle\Entity\PersonaRepository")
 */

 class Persona {
     
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $nombre;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $apellido;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $correo;
    
    /**
     * @ORM\OneToMany(targetEntity="Asignacion", mappedBy="persona")
     */
    Private $asignaciones;




    


    


    
            

}


?>
