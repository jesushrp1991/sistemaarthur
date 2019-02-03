<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VentaTransaction
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class VentaTransaction
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
     * @ORM\ManyToOne(targetEntity = "AdminBundle\Entity\Objeto", inversedBy = "ventatransactiones")
     * @ORM\JoinColumn(name="objeto_id", referencedColumnName="id", onDelete = "CASCADE")
     */
    private $objeto;

    /**
     * @var float
     *
     * @ORM\Column(name="deuda", type="float")
     */
    private $deuda;

    /**
     * @var float
     *
     * @ORM\Column(name="precioventa", type="float")
     */
    private $precioventa;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadventa", type="integer")
     */
    private $cantidadventa;

    /**
     * @var string
     *
     * @ORM\Column(name="comprador", type="string", length=255)
     */
    private $comprador;

    public function __construct()
    {
        $this->deuda = 0;
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return VentaTransaction
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
     * Set deuda
     *
     * @param float $deuda
     * @return VentaTransaction
     */
    public function setDeuda($deuda)
    {
        $this->deuda = $deuda;

        return $this;
    }

    /**
     * Get deuda
     *
     * @return float 
     */
    public function getDeuda()
    {
        return $this->deuda;
    }

    /**
     * Set precioventa
     *
     * @param float $precioventa
     * @return VentaTransaction
     */
    public function setPrecioventa($precioventa)
    {
        $this->precioventa = $precioventa;

        return $this;
    }

    /**
     * Get precioventa
     *
     * @return float 
     */
    public function getPrecioventa()
    {
        return $this->precioventa;
    }

    /**
     * Set comprador
     *
     * @param string $comprador
     * @return VentaTransaction
     */
    public function setComprador($comprador)
    {
        $this->comprador = $comprador;

        return $this;
    }

    /**
     * Get comprador
     *
     * @return string 
     */
    public function getComprador()
    {
        return $this->comprador;
    }

    /**
     * Set cantidadventa
     *
     * @param integer $cantidadventa
     * @return VentaTransaction
     */
    public function setCantidadventa($cantidadventa)
    {
        $this->cantidadventa = $cantidadventa;
    
        return $this;
    }

    /**
     * Get cantidadventa
     *
     * @return integer 
     */
    public function getCantidadventa()
    {
        return $this->cantidadventa;
    }

    /**
     * Set objeto
     *
     * @param \AdminBundle\Entity\Objeto $objeto
     * @return VentaTransaction
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
