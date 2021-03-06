<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompraTransaction
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CompraTransaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime")
     */
    private $fechaHora;

    /**
     * @ORM\ManyToOne(targetEntity = "AdminBundle\Entity\Objeto", inversedBy = "compratransactiones")
     * @ORM\JoinColumn(name="objeto_id", referencedColumnName="id", onDelete = "CASCADE")
     */
    private $objeto;

    /**
     * @var float
     *
     * @ORM\Column(name="preciocompra", type="float")
     */
    private $preciocompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadcomprada", type="integer")
     */
    private $cantidadcomprada;

    /**
     * @var string
     *
     * @ORM\Column(name="proveedor", type="string", length=255)
     */
    private $proveedor;

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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return CompraTransaction
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set preciocompra
     *
     * @param float $preciocompra
     * @return CompraTransaction
     */
    public function setPreciocompra($preciocompra)
    {
        $this->preciocompra = $preciocompra;

        return $this;
    }

    /**
     * Get preciocompra
     *
     * @return float 
     */
    public function getPreciocompra()
    {
        return $this->preciocompra;
    }

    /**
     * Set cantidadcomprada
     *
     * @param integer $cantidadcomprada
     * @return CompraTransaction
     */
    public function setCantidadcomprada($cantidadcomprada)
    {
        $this->cantidadcomprada = $cantidadcomprada;

        return $this;
    }

    /**
     * Get cantidadcomprada
     *
     * @return integer 
     */
    public function getCantidadcomprada()
    {
        return $this->cantidadcomprada;
    }

    /**
     * Set proveedor
     *
     * @param string $proveedor
     * @return CompraTransaction
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set objeto
     *
     * @param \AdminBundle\Entity\Objeto $objeto
     * @return CompraTransaction
     */
    public function setObjeto(\AdminBundle\Entity\Objeto $objeto = null)
    {
        $this->objeto = $objeto;
    
        return $this;
    }

    /**
     * Get objeto
     *
     * @return \AdminBundle\Entity\Objeto 
     */
    public function getObjeto()
    {
        return $this->objeto;
    }
}
