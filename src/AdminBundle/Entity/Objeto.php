<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Objeto
 *
 * @ORM\Table(name="objeto")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"objeto" = "Objeto", "miscelanea" = "Miscelanea", "movil" = "Movil"})
 */
class Objeto {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadenstock", type="integer")
     */
    protected $cantidadenstock;

    /**
     * @var float
     *
     * @ORM\Column(name="preciocompra", type="float")
     */
    protected $preciocompra;

    /**
     * @var float
     *
     * @ORM\Column(name="precioventa", type="float")
     */
    protected $precioventa;

    /**
     * @ORM\OneToMany(targetEntity= "AdminBundle\Entity\VentaTransaction", mappedBy="objeto")
     */
    protected $ventatransactiones;

    /**
     * @ORM\OneToMany(targetEntity= "AdminBundle\Entity\CompraTransaction", mappedBy="objeto")
     */
    protected $compratransactiones;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set cantidadenstock
     *
     * @param integer $cantidadenstock
     * @return Objeto
     */
    public function setCantidadenstock($cantidadenstock) {
        $this->cantidadenstock = $cantidadenstock;

        return $this;
    }

    /**
     * Get cantidadenstock
     *
     * @return integer 
     */
    public function getCantidadenstock() {
        return $this->cantidadenstock;
    }

    /**
     * Set preciocompra
     *
     * @param float $preciocompra
     * @return Objeto
     */
    public function setPreciocompra($preciocompra) {
        $this->preciocompra = $preciocompra;

        return $this;
    }

    /**
     * Get preciocompra
     *
     * @return float 
     */
    public function getPreciocompra() {
        return $this->preciocompra;
    }

    /**
     * Set precioventa
     *
     * @param float $precioventa
     * @return Objeto
     */
    public function setPrecioventa($precioventa) {
        $this->precioventa = $precioventa;

        return $this;
    }

    /**
     * Get precioventa
     *
     * @return float 
     */
    public function getPrecioventa() {
        return $this->precioventa;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ventatransactiones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->compratransactiones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cantidadenstock = 0;
    }

    /**
     * Add ventatransactiones
     *
     * @param \AdminBundle\Entity\VentaTransaction $ventatransactiones
     * @return Objeto
     */
    public function addVentatransactione(\AdminBundle\Entity\VentaTransaction $ventatransactiones)
    {
        $this->ventatransactiones[] = $ventatransactiones;
    
        return $this;
    }

    /**
     * Remove ventatransactiones
     *
     * @param \AdminBundle\Entity\VentaTransaction $ventatransactiones
     */
    public function removeVentatransactione(\AdminBundle\Entity\VentaTransaction $ventatransactiones)
    {
        $this->ventatransactiones->removeElement($ventatransactiones);
    }

    /**
     * Get ventatransactiones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVentatransactiones()
    {
        return $this->ventatransactiones;
    }

    /**
     * Add compratransactiones
     *
     * @param \AdminBundle\Entity\CompraTransaction $compratransactiones
     * @return Objeto
     */
    public function addCompratransactione(\AdminBundle\Entity\CompraTransaction $compratransactiones)
    {
        $this->compratransactiones[] = $compratransactiones;
    
        return $this;
    }

    /**
     * Remove compratransactiones
     *
     * @param \AdminBundle\Entity\CompraTransaction $compratransactiones
     */
    public function removeCompratransactione(\AdminBundle\Entity\CompraTransaction $compratransactiones)
    {
        $this->compratransactiones->removeElement($compratransactiones);
    }

    /**
     * Get compratransactiones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompratransactiones()
    {
        return $this->compratransactiones;
    }
}
