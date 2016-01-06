<?php

namespace SEC\SolicitudesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SEC\SolicitudesBundle\Entity\Proceso
 *
 * @ORM\Table(name="tb_proceso")
 * @ORM\Entity(repositoryClass="SEC\SolicitudesBundle\Entity\ProcesoRepository")
 */

 class Proceso {
     
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
    protected $fechaRecSDA;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechaRecSER;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $titulo;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    
    protected $resumen;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    
    protected $infoadicional;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MaxLength(255)
     */
    
    protected $noradicado;

    /**
     * @ORM\Column(type="integer")
     */
    
    protected $diasrespuesta;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fechamaxrespuesta;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    protected $alerta1;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    protected $alerta2;


    


    

    


    
    
    
    /**
     * @ORM\OneToMany(targetEntity="Asignacion", mappedBy="proceso", cascade={"persist", "remove"})
     * @Assert\Valid
     */
    Private $asignaciones;

    /**
     * @ORM\ManyToOne(targetEntity="EnteControl", inversedBy="procesos", cascade={"remove"})
     * @ORM\JoinColumn(name="EnteControl_id", referencedColumnName="id")
     */
    
    protected $entecontrol;

    /**
     * @ORM\ManyToOne(targetEntity="Tipo", inversedBy="procesos", cascade={"remove"})
     * @ORM\JoinColumn(name="Tipo_id", referencedColumnName="id")
     */
    
    protected $tipo;


    
    
        
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
     * Constructor
     */
    public function __construct()
    {
        $this->asignaciones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fechaRecSDA
     *
     * @param \DateTime $fechaRecSDA
     * @return Proceso
     */
    public function setFechaRecSDA($fechaRecSDA)
    {
        $this->fechaRecSDA = $fechaRecSDA;
    
        return $this;
    }

    /**
     * Get fechaRecSDA
     *
     * @return \DateTime 
     */
    public function getFechaRecSDA()
    {
        return $this->fechaRecSDA;
    }

    /**
     * Set fechaRecSER
     *
     * @param \DateTime $fechaRecSER
     * @return Proceso
     */
    public function setFechaRecSER($fechaRecSER)
    {
        $this->fechaRecSER = $fechaRecSER;
    
        return $this;
    }

    /**
     * Get fechaRecSER
     *
     * @return \DateTime 
     */
    public function getFechaRecSER()
    {
        return $this->fechaRecSER;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Proceso
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set resumen
     *
     * @param string $resumen
     * @return Proceso
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
    
        return $this;
    }

    /**
     * Get resumen
     *
     * @return string 
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set infoadicional
     *
     * @param string $infoadicional
     * @return Proceso
     */
    public function setInfoadicional($infoadicional)
    {
        $this->infoadicional = $infoadicional;
    
        return $this;
    }

    /**
     * Get infoadicional
     *
     * @return string 
     */
    public function getInfoadicional()
    {
        return $this->infoadicional;
    }

    /**
     * Set noradicado
     *
     * @param string $noradicado
     * @return Proceso
     */
    public function setNoradicado($noradicado)
    {
        $this->noradicado = $noradicado;
    
        return $this;
    }

    /**
     * Get noradicado
     *
     * @return string 
     */
    public function getNoradicado()
    {
        return $this->noradicado;
    }

    /**
     * Set diasrespuesta
     *
     * @param integer $diasrespuesta
     * @return Proceso
     */
    public function setDiasrespuesta($diasrespuesta)
    {
        $this->diasrespuesta = $diasrespuesta;
    
        return $this;
    }

    /**
     * Get diasrespuesta
     *
     * @return integer 
     */
    public function getDiasrespuesta()
    {
        return $this->diasrespuesta;
    }

    /**
     * Set fechamaxrespuesta
     *
     * @param \DateTime $fechamaxrespuesta
     * @return Proceso
     */
    public function setFechamaxrespuesta($fechamaxrespuesta)
    {
        $this->fechamaxrespuesta = $fechamaxrespuesta;
    
        return $this;
    }

    /**
     * Get fechamaxrespuesta
     *
     * @return \DateTime 
     */
    public function getFechamaxrespuesta()
    {
        return $this->fechamaxrespuesta;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Proceso
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
     * @return Proceso
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
     * Add asignaciones
     *
     * @param \SEC\SolicitudesBundle\Entity\Asignacion $asignaciones
     * @return Proceso
     */
    public function addAsignacione(\SEC\SolicitudesBundle\Entity\Asignacion $asignaciones)
    {
        $this->asignaciones[] = $asignaciones;
    
        return $this;
    }

    /**
     * Remove asignaciones
     *
     * @param \SEC\SolicitudesBundle\Entity\Asignacion $asignaciones
     */
    public function removeAsignacione(\SEC\SolicitudesBundle\Entity\Asignacion $asignaciones)
    {
        $this->asignaciones->removeElement($asignaciones);
    }

    /**
     * Get asignaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAsignaciones()
    {
        return $this->asignaciones;
    }

    /**
     * Set entecontrol
     *
     * @param \SEC\SolicitudesBundle\Entity\EnteControl $entecontrol
     * @return Proceso
     */
    public function setEntecontrol(\SEC\SolicitudesBundle\Entity\EnteControl $entecontrol = null)
    {
        $this->entecontrol = $entecontrol;
    
        return $this;
    }

    /**
     * Get entecontrol
     *
     * @return \SEC\SolicitudesBundle\Entity\EnteControl 
     */
    public function getEntecontrol()
    {
        return $this->entecontrol;
    }

    /**
     * Set tipo
     *
     * @param \SEC\SolicitudesBundle\Entity\Tipo $tipo
     * @return Proceso
     */
    public function setTipo(\SEC\SolicitudesBundle\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \SEC\SolicitudesBundle\Entity\Tipo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set alerta1
     *
     * @param \DateTime $alerta1
     * @return Proceso
     */
    public function setAlerta1($alerta1)
    {
        $this->alerta1 = $alerta1;
    
        return $this;
    }

    /**
     * Get alerta1
     *
     * @return \DateTime 
     */
    public function getAlerta1()
    {
        return $this->alerta1;
    }

    /**
     * Set alerta2
     *
     * @param \DateTime $alerta2
     * @return Proceso
     */
    public function setAlerta2($alerta2)
    {
        $this->alerta2 = $alerta2;
    
        return $this;
    }

    /**
     * Get alerta2
     *
     * @return \DateTime 
     */
    public function getAlerta2()
    {
        return $this->alerta2;
    }
}