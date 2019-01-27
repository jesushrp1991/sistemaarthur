<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var float
     *
     * @ORM\Column(name="dineroencasa", type="float")
     */
    private $dineroencasa;

    /**
     * @var float
     *
     * @ORM\Column(name="tarjeta", type="float")
     */
    private $tarjeta;

    /**
     * @var float
     *
     * @ORM\Column(name="gastos", type="float")
     */
    private $gastos;


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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set dineroencasa
     *
     * @param float $dineroencasa
     * @return User
     */
    public function setDineroencasa($dineroencasa)
    {
        $this->dineroencasa = $dineroencasa;

        return $this;
    }

    /**
     * Get dineroencasa
     *
     * @return float 
     */
    public function getDineroencasa()
    {
        return $this->dineroencasa;
    }

    /**
     * Set tarjeta
     *
     * @param float $tarjeta
     * @return User
     */
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    /**
     * Get tarjeta
     *
     * @return float 
     */
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set gastos
     *
     * @param float $gastos
     * @return User
     */
    public function setGastos($gastos)
    {
        $this->gastos = $gastos;

        return $this;
    }

    /**
     * Get gastos
     *
     * @return float 
     */
    public function getGastos()
    {
        return $this->gastos;
    }
}
