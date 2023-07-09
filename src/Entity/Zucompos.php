<?php

namespace App\Entity;

use App\Repository\ZucomposRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZucomposRepository::class)
 */
class Zucompos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=15)
     */
    private $Refunite;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Refche;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $Responsable;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Datedebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Datefin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Ordre;

    /**
     * @ORM\ManyToOne(
     * targetEntity=Zchercheur::class,inversedBy="Idche")
     *  @ORM\JoinColumn(nullable=false, name="FkZchercheur", referencedColumnName="Idche")
     */ 
    private $Zchercheurs;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefunite(): ?string
    {
        return $this->Refunite;
    }

    public function setRefunite(string $Refunite): self
    {
        $this->Refunite = $Refunite;

        return $this;
    }

    public function getRefche(): ?int
    {
        return $this->Refche;
    }

    public function setRefche(?int $Refche): self
    {
        $this->Refche = $Refche;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(?string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->Datedebut;
    }

    public function setDatedebut(?\DateTimeInterface $Datedebut): self
    {
        $this->Datedebut = $Datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->Datefin;
    }

    public function setDatefin(?\DateTimeInterface $Datefin): self
    {
        $this->Datefin = $Datefin;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(?int $Ordre): self
    {
        $this->Ordre = $Ordre;

        return $this;
    }
}
