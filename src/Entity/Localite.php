<?php

namespace App\Entity;

use App\Repository\LocaliteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocaliteRepository::class)
 */
class Localite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $Localite;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $SousCommune;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $CommunePrincipale;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Province;

     /**
     * @ORM\OneToMany(targetEntity=BaseAgentAdresse::class,mappedBy="Fk_Localite")
     */
    private $BaseAgentAdresse;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->Localite;
    }

    public function setLocalite(?string $Localite): self
    {
        $this->Localite = $Localite;

        return $this;
    }

    public function getSousCommune(): ?string
    {
        return $this->SousCommune;
    }

    public function setSousCommune(?string $SousCommune): self
    {
        $this->SousCommune = $SousCommune;

        return $this;
    }

    public function getCommunePrincipale(): ?string
    {
        return $this->CommunePrincipale;
    }

    public function setCommunePrincipale(?string $CommunePrincipale): self
    {
        $this->CommunePrincipale = $CommunePrincipale;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->Province;
    }

    public function setProvince(?string $Province): self
    {
        $this->Province = $Province;

        return $this;
    }
}
