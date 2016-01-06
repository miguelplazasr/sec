<?php

namespace SEC\SolicitudesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SEC\SolicitudesBundle\Entity\Asignacion
 *
 * @ORM\Table(name="tb_asignacion")
 * @ORM\Entity(repositoryClass="SEC\SolicitudesBundle\Entity\AsignacionRepository")
 */

 class Asignacion {
     
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
     
    protected $id;


    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaEnvio;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaRecepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="asignaciones", cascade={"remove"})
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */
    
    protected $persona;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proceso", inversedBy="asignaciones", cascade={"persist"})
     * @ORM\JoinColumn(name="Proceso_id", referencedColumnName="id")
     */
    
    protected $proceso;
    
    
    /**
     * @var datetime $created
     * 
     * @ORM\Column( type="datetime")
     * @Gedmo\Timestampable(on="create")
     * 
     */
    
    private $created_at;


    
    /**
     * @var datetime $updated
     * 
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    
    private $update_at;


    


    


    
            


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
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Asignacion
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;
    
        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime 
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     * @return Asignacion
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;
    
        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime 
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Asignacion
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set update_at
     *
     * @param \DateTime $updateAt
     * @return Asignacion
     */
    public function setUpdateAt($updateAt)
    {
        $this->update_at = $updateAt;
    
        return $this;
    }

    /**
     * Get update_at
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * Set persona
     *
     * @param \SEC\SolicitudesBundle\Entity\Persona $persona
     * @return Asignacion
     */
    public function setPersona(\SEC\SolicitudesBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;
    
        return $this;
    }

    /**
     * Get persona
     *
     * @return \SEC\SolicitudesBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set proceso
     *
     * @param \SEC\SolicitudesBundle\Entity\Proceso $proceso
     * @return Asignacion
     */
    public function setProceso(\SEC\SolicitudesBundle\Entity\Proceso $proceso = null)
    {
        $this->proceso = $proceso;
    
        return $this;
    }

    /**
     * Get proceso
     *
     * @return \SEC\SolicitudesBundle\Entity\Proceso 
     */
    public function getProceso()
    {
        return $this->proceso;
    }
}