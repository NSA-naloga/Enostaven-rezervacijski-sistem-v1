<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesor
 *
 * @ORM\Table(name="Profesor", uniqueConstraints={@ORM\UniqueConstraint(name="Profesor_ID", columns={"Profesor_ID"})})
 * @ORM\Entity
 */
class Profesor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Profesor_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $profesorId;

    /**
     * @var string
     *
     * @ORM\Column(name="Profesor_Ime", type="string", length=50, nullable=false)
     */
    private $profesorIme;

    /**
     * @var string
     *
     * @ORM\Column(name="Profesor_Priimek", type="string", length=50, nullable=false)
     */
    private $profesorPriimek;



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
     * Set profesorIme
     *
     * @param string $profesorIme
     * @return Profesor
     */
    public function setProfesorIme($profesorIme)
    {
        $this->profesorIme = $profesorIme;

        return $this;
    }

    /**
     * Get profesorIme
     *
     * @return string 
     */
    public function getProfesorIme()
    {
        return $this->profesorIme;
    }

    /**
     * Set profesorPriimek
     *
     * @param string $profesorPriimek
     * @return Profesor
     */
    public function setProfesorPriimek($profesorPriimek)
    {
        $this->profesorPriimek = $profesorPriimek;

        return $this;
    }

    /**
     * Get profesorPriimek
     *
     * @return string 
     */
    public function getProfesorPriimek()
    {
        return $this->profesorPriimek;
    }
}
