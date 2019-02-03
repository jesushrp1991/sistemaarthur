<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

        /**
         * @ORM\OneToMany(targetEntity= "AdminBundle\Entity\Especificacion", mappedBy="categoria")
         */
    protected $especificaciones;
   
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
     * @return Categoria
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
     * Constructor
     */
    public function __construct()
    {
        $this->especificaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add especificaciones
     *
     * @param \AdminBundle\Entity\Especificacion $especificaciones
     * @return Categoria
     */
    public function addEspecificacione(\AdminBundle\Entity\Especificacion $especificaciones)
    {
        $this->especificaciones[] = $especificaciones;
    
        return $this;
    }

    /**
     * Remove especificaciones
     *
     * @param \AdminBundle\Entity\Especificacion $especificaciones
     */
    public function removeEspecificacione(\AdminBundle\Entity\Especificacion $especificaciones)
    {
        $this->especificaciones->removeElement($especificaciones);
    }

    /**
     * Get especificaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspecificaciones()
    {
        return $this->especificaciones;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
