<?php
// src/Acme/UserBundle/Entity/User.php

namespace NSA\Bundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @var string
     *
     * @ORM\Column(name="Ime", type="string", length=255)
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="Priimek", type="string", length=255)
     */
    private $priimek;

    /**
     * @var string
     *
     * @ORM\Column(name="Emso", type="string", length=255)
     */
    private $emso;


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
     * Set ime
     *
     * @param string $ime
     * @return Profesor
     */
    public function setIme($ime)
    {
        $this->ime = $ime;

        return $this;
    }

    /**
     * Get ime
     *
     * @return string 
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * Set priimek
     *
     * @param string $priimek
     * @return Profesor
     */
    public function setPriimek($priimek)
    {
        $this->priimek = $priimek;

        return $this;
    }

    /**
     * Get priimek
     *
     * @return string 
     */
    public function getPriimek()
    {
        return $this->priimek;
    }

    /**
     * Set emso
     *
     * @param string $emso
     * @return Profesor
     */
    public function setEmso($emso)
    {
        $this->emso = $emso;

        return $this;
    }

    /**
     * Get emso
     *
     * @return string 
     */
    public function getEmso()
    {
        return $this->emso;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}