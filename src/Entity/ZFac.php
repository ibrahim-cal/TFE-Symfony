<?php

namespace App\Entity;

use App\Repository\ZFacRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZFacRepository::class)
 */
class ZFac
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=15)
     */
    private $Fac;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $Faculte;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $FaculteUK;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Sigle;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DMaj;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $CC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Infofin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $IdFac;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Actif;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Groupe;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Invent20;


         /**
     * @ORM\OneToOne(targetEntity=Unit::class,mappedBy="FkZFac")
     */
    private $Unit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFac(): ?string
    {
        return $this->Fac;
    }

    public function setFac(string $Fac): self
    {
        $this->Fac = $Fac;

        return $this;
    }

    public function getFaculte(): ?string
    {
        return $this->Faculte;
    }

    public function setFaculte(?string $Faculte): self
    {
        $this->Faculte = $Faculte;

        return $this;
    }

    public function getFaculteUK(): ?string
    {
        return $this->FaculteUK;
    }

    public function setFaculteUK(?string $FaculteUK): self
    {
        $this->FaculteUK = $FaculteUK;

        return $this;
    }

    public function getSigle(): ?string
    {
        return $this->Sigle;
    }

    public function setSigle(?string $Sigle): self
    {
        $this->Sigle = $Sigle;

        return $this;
    }

    public function getDMaj(): ?\DateTimeInterface
    {
        return $this->DMaj;
    }

    public function setDMaj(?\DateTimeInterface $DMaj): self
    {
        $this->DMaj = $DMaj;

        return $this;
    }

    public function getCC(): ?string
    {
        return $this->CC;
    }

    public function setCC(?string $CC): self
    {
        $this->CC = $CC;

        return $this;
    }

    public function getInfofin(): ?int
    {
        return $this->Infofin;
    }

    public function setInfofin(?int $Infofin): self
    {
        $this->Infofin = $Infofin;

        return $this;
    }

    public function getIdFac(): ?int
    {
        return $this->IdFac;
    }

    public function setIdFac(?int $IdFac): self
    {
        $this->IdFac = $IdFac;

        return $this;
    }

    public function getActif(): ?int
    {
        return $this->Actif;
    }

    public function setActif(?int $Actif): self
    {
        $this->Actif = $Actif;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->Groupe;
    }

    public function setGroupe(?string $Groupe): self
    {
        $this->Groupe = $Groupe;

        return $this;
    }

    public function getInvent20(): ?int
    {
        return $this->Invent20;
    }

    public function setInvent20(?int $Invent20): self
    {
        $this->Invent20 = $Invent20;

        return $this;
    }
}
