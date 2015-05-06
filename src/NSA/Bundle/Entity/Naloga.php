<?php

namespace NSA\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Naloga
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Naloga
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
     * @ORM\Column(name="Naslov", type="string", length=255)
     */
    private $naslov;

    /**
     * @var string
     *
     * @ORM\Column(name="Opis", type="string", length=255)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="Kljucne_besede", type="string", length=255)
     */
    private $kljucneBesede;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_kreiranja", type="datetime")
     */
    private $datumKreiranja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_objave", type="datetime")
     */
    private $datumObjave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Zacetni_datum", type="datetime")
     */
    private $zacetniDatum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum_oddaje", type="datetime")
     */
    private $datumOddaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="Stevilo_kandidatov", type="integer")
     */
    private $steviloKandidatov;

    /**
     * @var integer
     *
     * @ORM\Column(name="Profesor", type="string", length=255)
     */
    private $profesor;


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
     * Set steviloKandidatov
     *
     * @param integer $steviloKandidatov
     * @return Naloga
     */
    public function setSteviloKandidatov($steviloKandidatov)
    {
        $this->steviloKandidatov = $steviloKandidatov;

        return $this;
    }

    /**
     * Get steviloKandidatov
     *
     * @return integer 
     */
    public function getSteviloKandidatov()
    {
        return $this->steviloKandidatov;
    }

    /**
     * Set profesor
     *
     * @param string $profesor
     * @return Naloga
     */
    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return string
     */
    public function getProfesor()
    {
        return $this->profesor;
    }
}
