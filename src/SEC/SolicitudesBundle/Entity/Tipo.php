<?php


namespace SEC\SolicitudesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SEC\SolicitudesBundle\Entity\Tipo
 *
 * @ORM\Table(name="tb_tipo")
 * @ORM\Entity(repositoryClass="SEC\SolicitudesBundle\Entity\TipoRepository")
 */

 class Tipo {
     
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
    
    protected $descripcion;
    
    /**
     * @ORM\OneToMany(targetEntity="Proceso", mappedBy="tipo")
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tipo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add procesos
     *
     * @param \SEC\SolicitudesBundle\Entity\Proceso $procesos
     * @return Tipo
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