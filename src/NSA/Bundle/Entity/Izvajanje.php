<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Izvajanje
 *
 * @ORM\Table(name="Izvajanje", indexes={@ORM\Index(name="Naloga_ID", columns={"Naloga_ID"})})
 * @ORM\Entity
 */
class Izvajanje
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Profesor_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $profesorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Naloga_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nalogaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Izvajanje_ID", type="integer", nullable=false)
     */
    private $izvajanjeId;



    /**
     * Set profesorId
     *
     * @param integer $profesorId
     * @return Izvajanje
     */
    public function setProfesorId($profesorId)
    {
        $this->profesorId = $profesorId;

        return $this;
    }

    /**
     * Get profesorId
     *
     * @return integer 
     */
    public function getProfesorId()
    {
        return $this->profesorId;
    }

    /**
     * Set nalogaId
     *
     * @param integer $nalogaId
     * @return Izvajanje
     */
    public function setNalogaId($nalogaId)
    {
        $this->nalogaId = $nalogaId;

        return $this;
    }

    /**
     * Get nalogaId
     *
     * @return integer 
     */
    public function getNalogaId()
    {
        return $this->nalogaId;
    }

    /**
     * Set izvajanjeId
     *
     * @param integer $izvajanjeId
     * @return Izvajanje
     */
    public function setIzvajanjeId($izvajanjeId)
    {
        $this->izvajanjeId = $izvajanjeId;

        return $this;
    }

    /**
     * Get izvajanjeId
     *
     * @return integer 
     */
    public function getIzvajanjeId()
    {
        return $this->izvajanjeId;
    }
}
