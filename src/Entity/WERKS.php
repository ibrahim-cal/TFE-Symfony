<?php

namespace App\Entity;

use App\Repository\WERKSRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WERKSRepository::class)
 */
class WERKS
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=15)
     */
    private $WERKS;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $Nom_Domaine;


                /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FKWERKS")
     */
    private $mandats;


     /**
     * @ORM\OneToMany(targetEntity=BTRTL::class,mappedBy="FkWERKS")
     */
    private $BTRTL;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWERKS(): ?string
    {
        return $this->WERKS;
    }

    public function setWERKS(string $WERKS): self
    {
        $this->WERKS = $WERKS;

        return $this;
    }

    public function getNomDomaine(): ?string
    {
        return $this->Nom_Domaine;
    }

    public function setNomDomaine(?string $Nom_Domaine): self
    {
        $this->Nom_Domaine = $Nom_Domaine;

        return $this;
    }
}
