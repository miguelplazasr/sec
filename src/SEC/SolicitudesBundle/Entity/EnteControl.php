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
 * SEC\SolicitudesBundle\Entity\EnteControl
 *
 * @ORM\Table(name="tb_entecontrol")
 * @ORM\Entity(repositoryClass="SEC\SolicitudesBundle\Entity\EnteControlRepository")
 */

 class EnteControl {
     
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $nombre;
    
    /**
     * @ORM\OneToMany(targetEntity="Proceso", mappedBy="entecontrol")
     */
    Private $procesos;




    
            

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->procesos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return EnteControl
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add procesos
     *
     * @param \SEC\SolicitudesBundle\Entity\Proceso $procesos
     * @return EnteControl
     */
    public function addProceso(\SEC\SolicitudesBundle\Entity\Proceso $procesos)
    {
        $this->procesos[] = $procesos;
    
        return $this;
    }

    /**
     * Remove procesos
     *
     * @param \SEC\SolicitudesBundle\Entity\Proceso $procesos
     */
    public function removeProceso(\SEC\SolicitudesBundle\Entity\Proceso $procesos)
    {
        $this->procesos->removeElement($procesos);
    }

    /**
     * Get procesos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProcesos()
    {
        return $this->procesos;
    }
}