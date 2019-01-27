<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeudaTransaction
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DeudaTransaction
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
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255)
     */
    private $concepto;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="deudor", type="string", length=255)
     */
    private $deudor;

    /**
     * @var string
     *
     * @ORM\Column(name="montoinicial", type="string", length=255)
     */
    private $montoinicial;

    /**
     * @var float
     *
     * @ORM\Column(name="montorestante", type="float")
     */
    private $montorestante;

    /**
     * @var boolean
     *
     * @ORM\Column(name="saldada", type="boolean")
     */
    private $saldada;


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
     * @return DeudaTransaction
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
     * Set concepto
     *
     * @param string $concepto
     * @return DeudaTransaction
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return DeudaTransaction
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
     * Set deudor
     *
     * @param string $deudor
     * @return DeudaTransaction
     */
    public function setDeudor($deudor)
    {
        $this->deudor = $deudor;

        return $this;
    }

    /**
     * Get deudor
     *
     * @return string 
     */
    public function getDeudor()
    {
        return $this->deudor;
    }

    /**
     * Set montoinicial
     *
     * @param string $montoinicial
     * @return DeudaTransaction
     */
    public function setMontoinicial($montoinicial)
    {
        $this->montoinicial = $montoinicial;

        return $this;
    }

    /**
     * Get montoinicial
     *
     * @return string 
     */
    public function getMontoinicial()
    {
        return $this->montoinicial;
    }

    /**
     * Set montorestante
     *
     * @param float $montorestante
     * @return DeudaTransaction
     */
    public function setMontorestante($montorestante)
    {
        $this->montorestante = $montorestante;

        return $this;
    }

    /**
     * Get montorestante
     *
     * @return float 
     */
    public function getMontorestante()
    {
        return $this->montorestante;
    }

    /**
     * Set saldada
     *
     * @param boolean $saldada
     * @return DeudaTransaction
     */
    public function setSaldada($saldada)
    {
        $this->saldada = $saldada;

        return $this;
    }

    /**
     * Get saldada
     *
     * @return boolean 
     */
    public function getSaldada()
    {
        return $this->saldada;
    }
}
