<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objeto
 *
 * @ORM\Table()
 * @ORM\Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"objeto" = "Objeto", "miscelanea" = "Miscelanea", "movil" = "Movil",})
 */
class Objeto {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidadenstock", type="integer")
     */
    private $cantidadenstock;

    /**
     * @var float
     *
     * @ORM\Column(name="preciocompra", type="float")
     */
    private $preciocompra;

    /**
     * @var float
     *
     * @ORM\Column(name="precioventa", type="float")
     */
    private $precioventa;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

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
     * Set tipo
     *
     * @param string $tipo
     * @return Objeto
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo() {
        return $this->tipo;
    }

}
