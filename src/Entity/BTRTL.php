<?php

namespace App\Entity;

use App\Repository\BTRTLRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BTRTLRepository::class)
 */
class BTRTL
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10)
     */
    private $BTRTL;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $Nom_SousDomaine;

             /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkBTRTL")
     */
    private $mandats;

               /**
     * @ORM\ManyToOne(targetEntity=WERKS::class, inversedBy="WERKS")
     * @ORM\JoinColumn(nullable=false, name="FkWERKS", referencedColumnName="WERKS")
     */
    private $WERKS;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBTRTL(): ?string
    {
        return $this->BTRTL;
    }

    public function setBTRTL(string $BTRTL): self
    {
        $this->BTRTL = $BTRTL;

        return $this;
    }
/*
    public function getFkWERKS(): ?string
    {
        return $this->FkWERKS;
    }

    public function setFkWERKS(?string $Fk_WERKS): self
    {
        $this->Fk_WERKS = $FkWERKS;

        return $this;
    }
*/
    public function getNomSousDomaine(): ?string
    {
        return $this->Nom_SousDomaine;
    }

    public function setNomSousDomaine(?string $Nom_SousDomaine): self
    {
        $this->Nom_SousDomaine = $Nom_SousDomaine;

        return $this;
    }
}
