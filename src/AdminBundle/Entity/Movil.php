<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movil
 *
 * @ORM\Table(name="movil")
 * @ORM\Entity
 */
class Movil extends Objeto
{
    //Propiedades de Movil----------------------------------------------------------------------
    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    protected $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    protected $modelo;

    /**
     * @var float
     *
     * @ORM\Column(name="frontmpcam", type="float")
     */
    protected $frontmpcam;

    /**
     * @var float
     *
     * @ORM\Column(name="backmpcam", type="float")
     */
    protected $backmpcam;

    /**
     * @var float
     *
     * @ORM\Column(name="androidversion", type="float")
     */
    protected $androidversion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sensorhuella", type="boolean")
     */
    protected $sensorhuella;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=255)
     */
    protected $cpu;

    /**
     * @var integer
     *
     * @ORM\Column(name="cpucores", type="integer")
     */
    protected $cpucores;

    /**
     * @var float
     *
     * @ORM\Column(name="cpuspeed", type="float")
     */
    protected $cpuspeed;

    /**
     * @var integer
     *
     * @ORM\Column(name="baterycapmah", type="integer")
     */
    protected $baterycapmah;

    /**
     * @var boolean
     *
     * @ORM\Column(name="baterycargarapida", type="boolean")
     */
    protected $baterycargarapida;

    /**
     * @var boolean
     *
     * @ORM\Column(name="baterycargainalambrica", type="boolean")
     */
    protected $baterycargainalambrica;

    /**
     * @var float
     *
     * @ORM\Column(name="ram", type="float")
     */
    protected $ram;

    /**
     * @var integer
     *
     * @ORM\Column(name="almacenamiento", type="integer")
     */
    protected $almacenamiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="microsd", type="integer")
     */
    protected $microsd;

    /**
     * @var integer
     *
     * @ORM\Column(name="screenresolutionwidth", type="integer")
     */
    protected $screenresolutionwidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="screenresolutionheight", type="integer")
     */
    protected $screenresolutionheight;

    /**
     * @var string
     *
     * @ORM\Column(name="screentipo", type="string", length=255)
     */
    protected $screentipo;

    /**
     * @var float
     *
     * @ORM\Column(name="screensize", type="float")
     */
    protected $screensize;

    /**
     * @var string
     *
     * @ORM\Column(name="screenprotection", type="string", length=255)
     */
    protected $screenprotection;

    /**
     * @var integer
     *
     * @ORM\Column(name="screendensity", type="bigint")
     */
    protected $screendensity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accesoriocable", type="boolean")
     */
    protected $accesoriocable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accesoriocargador", type="boolean")
     */
    protected $accesoriocargador;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accesoriomanoslibres", type="boolean")
     */
    protected $accesoriomanoslibres;

    /**
     * @var boolean
     *
     * @ORM\Column(name="waterresistant", type="boolean")
     */
    protected $waterresistant;
    //Funciones de Movil-------------------------------------------------------------------------------

    /**
     * Set marca
     *
     * @param string $marca
     * @return Movil
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Movil
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set frontmpcam
     *
     * @param float $frontmpcam
     * @return Movil
     */
    public function setFrontmpcam($frontmpcam)
    {
        $this->frontmpcam = $frontmpcam;

        return $this;
    }

    /**
     * Get frontmpcam
     *
     * @return float 
     */
    public function getFrontmpcam()
    {
        return $this->frontmpcam;
    }

    /**
     * Set backmpcam
     *
     * @param float $backmpcam
     * @return Movil
     */
    public function setBackmpcam($backmpcam)
    {
        $this->backmpcam = $backmpcam;

        return $this;
    }

    /**
     * Get backmpcam
     *
     * @return float 
     */
    public function getBackmpcam()
    {
        return $this->backmpcam;
    }

    /**
     * Set androidversion
     *
     * @param float $androidversion
     * @return Movil
     */
    public function setAndroidversion($androidversion)
    {
        $this->androidversion = $androidversion;

        return $this;
    }

    /**
     * Get androidversion
     *
     * @return float 
     */
    public function getAndroidversion()
    {
        return $this->androidversion;
    }

    /**
     * Set sensorhuella
     *
     * @param boolean $sensorhuella
     * @return Movil
     */
    public function setSensorhuella($sensorhuella)
    {
        $this->sensorhuella = $sensorhuella;

        return $this;
    }

    /**
     * Get sensorhuella
     *
     * @return boolean 
     */
    public function getSensorhuella()
    {
        return $this->sensorhuella;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     * @return Movil
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set cpucores
     *
     * @param integer $cpucores
     * @return Movil
     */
    public function setCpucores($cpucores)
    {
        $this->cpucores = $cpucores;

        return $this;
    }

    /**
     * Get cpucores
     *
     * @return integer 
     */
    public function getCpucores()
    {
        return $this->cpucores;
    }

    /**
     * Set cpuspeed
     *
     * @param float $cpuspeed
     * @return Movil
     */
    public function setCpuspeed($cpuspeed)
    {
        $this->cpuspeed = $cpuspeed;

        return $this;
    }

    /**
     * Get cpuspeed
     *
     * @return float 
     */
    public function getCpuspeed()
    {
        return $this->cpuspeed;
    }

    /**
     * Set baterycapmah
     *
     * @param integer $baterycapmah
     * @return Movil
     */
    public function setBaterycapmah($baterycapmah)
    {
        $this->baterycapmah = $baterycapmah;

        return $this;
    }

    /**
     * Get baterycapmah
     *
     * @return integer 
     */
    public function getBaterycapmah()
    {
        return $this->baterycapmah;
    }

    /**
     * Set baterycargarapida
     *
     * @param boolean $baterycargarapida
     * @return Movil
     */
    public function setBaterycargarapida($baterycargarapida)
    {
        $this->baterycargarapida = $baterycargarapida;

        return $this;
    }

    /**
     * Get baterycargarapida
     *
     * @return boolean 
     */
    public function getBaterycargarapida()
    {
        return $this->baterycargarapida;
    }

    /**
     * Set baterycargainalambrica
     *
     * @param boolean $baterycargainalambrica
     * @return Movil
     */
    public function setBaterycargainalambrica($baterycargainalambrica)
    {
        $this->baterycargainalambrica = $baterycargainalambrica;

        return $this;
    }

    /**
     * Get baterycargainalambrica
     *
     * @return boolean 
     */
    public function getBaterycargainalambrica()
    {
        return $this->baterycargainalambrica;
    }

    /**
     * Set ram
     *
     * @param float $ram
     * @return Movil
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return float 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set almacenamiento
     *
     * @param integer $almacenamiento
     * @return Movil
     */
    public function setAlmacenamiento($almacenamiento)
    {
        $this->almacenamiento = $almacenamiento;

        return $this;
    }

    /**
     * Get almacenamiento
     *
     * @return integer 
     */
    public function getAlmacenamiento()
    {
        return $this->almacenamiento;
    }

    /**
     * Set microsd
     *
     * @param integer $microsd
     * @return Movil
     */
    public function setMicrosd($microsd)
    {
        $this->microsd = $microsd;

        return $this;
    }

    /**
     * Get microsd
     *
     * @return integer 
     */
    public function getMicrosd()
    {
        return $this->microsd;
    }

    /**
     * Set screenresolutionwidth
     *
     * @param integer $screenresolutionwidth
     * @return Movil
     */
    public function setScreenresolutionwidth($screenresolutionwidth)
    {
        $this->screenresolutionwidth = $screenresolutionwidth;

        return $this;
    }

    /**
     * Get screenresolutionwidth
     *
     * @return integer 
     */
    public function getScreenresolutionwidth()
    {
        return $this->screenresolutionwidth;
    }

    /**
     * Set screenresolutionheight
     *
     * @param integer $screenresolutionheight
     * @return Movil
     */
    public function setScreenresolutionheight($screenresolutionheight)
    {
        $this->screenresolutionheight = $screenresolutionheight;

        return $this;
    }

    /**
     * Get screenresolutionheight
     *
     * @return integer 
     */
    public function getScreenresolutionheight()
    {
        return $this->screenresolutionheight;
    }

    /**
     * Set screentipo
     *
     * @param string $screentipo
     * @return Movil
     */
    public function setScreentipo($screentipo)
    {
        $this->screentipo = $screentipo;

        return $this;
    }

    /**
     * Get screentipo
     *
     * @return string 
     */
    public function getScreentipo()
    {
        return $this->screentipo;
    }

    /**
     * Set screensize
     *
     * @param float $screensize
     * @return Movil
     */
    public function setScreensize($screensize)
    {
        $this->screensize = $screensize;

        return $this;
    }

    /**
     * Get screensize
     *
     * @return float 
     */
    public function getScreensize()
    {
        return $this->screensize;
    }

    /**
     * Set screenprotection
     *
     * @param string $screenprotection
     * @return Movil
     */
    public function setScreenprotection($screenprotection)
    {
        $this->screenprotection = $screenprotection;

        return $this;
    }

    /**
     * Get screenprotection
     *
     * @return string 
     */
    public function getScreenprotection()
    {
        return $this->screenprotection;
    }

    /**
     * Set accesoriocable
     *
     * @param boolean $accesoriocable
     * @return Movil
     */
    public function setAccesoriocable($accesoriocable)
    {
        $this->accesoriocable = $accesoriocable;

        return $this;
    }

    /**
     * Get accesoriocable
     *
     * @return boolean 
     */
    public function getAccesoriocable()
    {
        return $this->accesoriocable;
    }

    /**
     * Set accesoriocargador
     *
     * @param boolean $accesoriocargador
     * @return Movil
     */
    public function setAccesoriocargador($accesoriocargador)
    {
        $this->accesoriocargador = $accesoriocargador;

        return $this;
    }

    /**
     * Get accesoriocargador
     *
     * @return boolean 
     */
    public function getAccesoriocargador()
    {
        return $this->accesoriocargador;
    }

    /**
     * Set accesoriomanoslibres
     *
     * @param boolean $accesoriomanoslibres
     * @return Movil
     */
    public function setAccesoriomanoslibres($accesoriomanoslibres)
    {
        $this->accesoriomanoslibres = $accesoriomanoslibres;

        return $this;
    }

    /**
     * Get accesoriomanoslibres
     *
     * @return boolean 
     */
    public function getAccesoriomanoslibres()
    {
        return $this->accesoriomanoslibres;
    }

    /**
     * Set waterresistant
     *
     * @param boolean $waterresistant
     * @return Movil
     */
    public function setWaterresistant($waterresistant)
    {
        $this->waterresistant = $waterresistant;

        return $this;
    }

    /**
     * Get waterresistant
     *
     * @return boolean 
     */
    public function getWaterresistant()
    {
        return $this->waterresistant;
    }

    public function __toString()
    {
        return $this->getMarca() . ' ' . $this->getModelo();
    }

    /**
     * Set screendensity
     *
     * @param integer $screendensity
     * @return Movil
     */
    public function setScreendensity($screendensity)
    {
        $this->screendensity = $screendensity;
    
        return $this;
    }

    /**
     * Get screendensity
     *
     * @return integer 
     */
    public function getScreendensity()
    {
        return $this->screendensity;
    }
}
