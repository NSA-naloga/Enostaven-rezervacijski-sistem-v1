<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rezervacija
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rezervacija
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
     * @ORM\Column(name="username", type="text")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="ime", type="text")
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="priimek", type="text")
     */
    private $priimek;

    /**
     * @var string
     *
     * @ORM\Column(name="razred", type="text")
     */
    private $razred;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="text")
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_naloge", type="integer")
     */
    private $idNaloge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum_oddaje", type="datetime")
     */
    private $datumOddaje;


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
     * Set username
     *
     * @param string $username
     * @return Rezervacija
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set ime
     *
     * @param string $ime
     * @return Rezervacija
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
     * @return Rezervacija
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
     * Set razred
     *
     * @param string $razred
     * @return Rezervacija
     */
    public function setRazred($razred)
    {
        $this->razred = $razred;

        return $this;
    }

    /**
     * Get razred
     *
     * @return string 
     */
    public function getRazred()
    {
        return $this->razred;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Rezervacija
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set idNaloge
     *
     * @param integer $idNaloge
     * @return Rezervacija
     */
    public function setIdNaloge($idNaloge)
    {
        $this->idNaloge = $idNaloge;

        return $this;
    }

    /**
     * Get idNaloge
     *
     * @return integer 
     */
    public function getIdNaloge()
    {
        return $this->idNaloge;
    }

    /**
     * Set datumOddaje
     *
     * @param \DateTime $datumOddaje
     * @return Rezervacija
     */
    public function setDatumOddaje($datumOddaje)
    {
        $this->datumOddaje = $datumOddaje;

        return $this;
    }

    /**
     * Get datumOddaje
     *
     * @return \DateTime 
     */
    public function getDatumOddaje()
    {
        return $this->datumOddaje;
    }
}
