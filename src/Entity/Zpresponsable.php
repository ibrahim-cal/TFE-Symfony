<?php

namespace App\Entity;

use App\Repository\ZpresponsableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZpresponsableRepository::class)
 */
class Zpresponsable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $RefProj;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $RepResp;

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

    public function getRefProj(): ?int
    {
        return $this->RefProj;
    }

    public function setRefProj(?int $RefProj): self
    {
        $this->RefProj = $RefProj;

        return $this;
    }

    public function getRepResp(): ?int
    {
        return $this->RepResp;
    }

    public function setRepResp(?int $RepResp): self
    {
        $this->RepResp = $RepResp;

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
