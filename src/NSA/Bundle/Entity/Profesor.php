<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Profesor
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
}
