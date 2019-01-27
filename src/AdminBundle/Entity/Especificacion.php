<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Especificacion
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="miscelaneas", type="string", length=255)
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
     * @param string $categoria
     * @return Especificacion
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set miscelaneas
     *
     * @param string $miscelaneas
     * @return Especificacion
     */
    public function setMiscelaneas($miscelaneas)
    {
        $this->miscelaneas = $miscelaneas;

        return $this;
    }

    /**
     * Get miscelaneas
     *
     * @return string 
     */
    public function getMiscelaneas()
    {
        return $this->miscelaneas;
    }
}
