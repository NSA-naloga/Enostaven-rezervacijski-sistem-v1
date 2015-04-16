<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Naloga
 *
 * @ORM\Table(name="Naloga", uniqueConstraints={@ORM\UniqueConstraint(name="Naloga_ID", columns={"Naloga_ID"})}, indexes={@ORM\Index(name="Profesor_ID", columns={"Profesor_ID"})})
 * @ORM\Entity
 */
class Naloga
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Naloga_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nalogaId;

    /**
     * @var string
     *
     * @ORM\Column(name="Naslov", type="string", length=50, nullable=false)
     */
    private $naslov;

    /**
     * @var string
     *
     * @ORM\Column(name="Opis", type="string", length=250, nullable=false)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="Kljucne_besede", type="string", length=150, nullable=true)
     */
    private $kljucneBesede;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_kreiranja", type="datetime", nullable=false)
     */
    private $datumKreiranja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_objave", type="datetime", nullable=false)
     */
    private $datumObjave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Zacetni_datum", type="datetime", nullable=false)
     */
    private $zacetniDatum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_oddaje", type="datetime", nullable=false)
     */
    private $datumOddaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="St_kandidatov", type="smallint", nullable=false)
     */
    private $stKandidatov;

    /**
     * @var integer
     *
     * @ORM\Column(name="Profesor_ID", type="integer", nullable=false)
     */
    private $profesorId;



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
     * Set naslov
     *
     * @param string $naslov
     * @return Naloga
     */
    public function setNaslov($naslov)
    {
        $this->naslov = $naslov;

        return $this;
    }

    /**
     * Get naslov
     *
     * @return string 
     */
    public function getNaslov()
    {
        return $this->naslov;
    }

    /**
     * Set opis
     *
     * @param string $opis
     * @return Naloga
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set kljucneBesede
     *
     * @param string $kljucneBesede
     * @return Naloga
     */
    public function setKljucneBesede($kljucneBesede)
    {
        $this->kljucneBesede = $kljucneBesede;

        return $this;
    }

    /**
     * Get kljucneBesede
     *
     * @return string 
     */
    public function getKljucneBesede()
    {
        return $this->kljucneBesede;
    }

    /**
     * Set datumKreiranja
     *
     * @param \DateTime $datumKreiranja
     * @return Naloga
     */
    public function setDatumKreiranja($datumKreiranja)
    {
        $this->datumKreiranja = $datumKreiranja;

        return $this;
    }

    /**
     * Get datumKreiranja
     *
     * @return \DateTime 
     */
    public function getDatumKreiranja()
    {
        return $this->datumKreiranja;
    }

    /**
     * Set datumObjave
     *
     * @param \DateTime $datumObjave
     * @return Naloga
     */
    public function setDatumObjave($datumObjave)
    {
        $this->datumObjave = $datumObjave;

        return $this;
    }

    /**
     * Get datumObjave
     *
     * @return \DateTime 
     */
    public function getDatumObjave()
    {
        return $this->datumObjave;
    }

    /**
     * Set zacetniDatum
     *
     * @param \DateTime $zacetniDatum
     * @return Naloga
     */
    public function setZacetniDatum($zacetniDatum)
    {
        $this->zacetniDatum = $zacetniDatum;

        return $this;
    }

    /**
     * Get zacetniDatum
     *
     * @return \DateTime 
     */
    public function getZacetniDatum()
    {
        return $this->zacetniDatum;
    }

    /**
     * Set datumOddaje
     *
     * @param \DateTime $datumOddaje
     * @return Naloga
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

    /**
     * Set stKandidatov
     *
     * @param integer $stKandidatov
     * @return Naloga
     */
    public function setStKandidatov($stKandidatov)
    {
        $this->stKandidatov = $stKandidatov;

        return $this;
    }

    /**
     * Get stKandidatov
     *
     * @return integer 
     */
    public function getStKandidatov()
    {
        return $this->stKandidatov;
    }

    /**
     * Set profesorId
     *
     * @param integer $profesorId
     * @return Naloga
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
}
