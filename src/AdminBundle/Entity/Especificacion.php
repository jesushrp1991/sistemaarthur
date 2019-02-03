<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especificacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AdminBundle\Entity\Repository\EspecificacionRepository")
 */
class Especificacion
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
     * @ORM\ManyToOne(targetEntity = "AdminBundle\Entity\Categoria", inversedBy = "especificaciones")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id", onDelete = "CASCADE")
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity= "AdminBundle\Entity\Miscelanea", mappedBy="especificaciones")
     */
    private $miscelaneas;

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
     * @return Especificacion
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
     * Set categoria
     *
     * @param \AdminBundle\Entity\Categoria $categoria
     * @return Especificacion
     */
    public function setCategoria(\AdminBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \AdminBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miscelaneas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add miscelaneas
     *
     * @param \AdminBundle\Entity\Miscelanea $miscelaneas
     * @return Especificacion
     */
    public function addMiscelanea(\AdminBundle\Entity\Miscelanea $miscelaneas)
    {
        $this->miscelaneas[] = $miscelaneas;
    
        return $this;
    }

    /**
     * Remove miscelaneas
     *
     * @param \AdminBundle\Entity\Miscelanea $miscelaneas
     */
    public function removeMiscelanea(\AdminBundle\Entity\Miscelanea $miscelaneas)
    {
        $this->miscelaneas->removeElement($miscelaneas);
    }

    /**
     * Get miscelaneas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMiscelaneas()
    {
        return $this->miscelaneas;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
