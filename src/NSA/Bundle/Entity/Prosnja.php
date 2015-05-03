<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prosnja
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Prosnja
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="zeljeni_status", type="string", length=255)
     */
    private $zeljeniStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="Komentar", type="string", length=255)
     */
    private $komentar;


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
     * @return Prosnja
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
     * Set zeljeniStatus
     *
     * @param string $zeljeniStatus
     * @return Prosnja
     */
    public function setZeljeniStatus($zeljeniStatus)
    {
        $this->zeljeniStatus = $zeljeniStatus;

        return $this;
    }

    /**
     * Get zeljeniStatus
     *
     * @return string 
     */
    public function getZeljeniStatus()
    {
        return $this->zeljeniStatus;
    }

    /**
     * Set komentar
     *
     * @param string $komentar
     * @return Prosnja
     */
    public function setKomentar($komentar)
    {
        $this->komentar = $komentar;

        return $this;
    }

    /**
     * Get komentar
     *
     * @return string 
     */
    public function getKomentar()
    {
        return $this->komentar;
    }
}
