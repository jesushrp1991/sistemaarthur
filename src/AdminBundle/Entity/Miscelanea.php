<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Miscelanea
 *
 * @ORM\Table(name="miscelanea")
 * @ORM\Entity
 */
class Miscelanea extends Objeto
{
    //Propiedades de Miscelanea------------------------------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity = "AdminBundle\Entity\Especificacion", inversedBy = "miscelaneas")
     * @ORM\JoinColumn(name="especificacion_id", referencedColumnName="id", onDelete = "CASCADE")
     */
    protected $especificaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    protected $descripcion;

    //Funciones de Miscelanea----------------------------------------------------------------------

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Miscelanea
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
     * Set especificaciones
     *
     * @param \AdminBundle\Entity\Especificacion $especificaciones
     * @return Miscelanea
     */
    public function setEspecificaciones(\AdminBundle\Entity\Especificacion $especificaciones = null)
    {
        $this->especificaciones = $especificaciones;

        return $this;
    }

    /**
     * Get especificaciones
     *
     * @return \AdminBundle\Entity\Especificacion
     */
    public function getEspecificaciones()
    {
        return $this->especificaciones;
    }

    public function __toString()
    {
        return $this->getEspecificaciones()->getCategoria()->getNombre() . ' '
            . $this->getEspecificaciones()->getNombre() . ' ' .$this->getDescripcion();
    }
}
