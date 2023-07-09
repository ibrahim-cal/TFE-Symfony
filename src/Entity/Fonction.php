<?php

namespace App\Entity;

use App\Repository\FonctionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FonctionRepository::class)
 */
class Fonction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10)
     */
    private $idFonction;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $libelle_du_fonction;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actif;



      /**
     * @ORM\OneToOne(targetEntity=AgentFonction::class,mappedBy="FkFonction")
     */
    private $AgentFonction;

    public function getIdFonction(): ?string
    {
        return $this->idFonction;
    }

    public function setIdFonction(string $idFonction): self
    {
        $this->idFonction = $idFonction;

        return $this;
    }

    public function getLibelleDuFonction(): ?string
    {
        return $this->libelle_du_fonction;
    }

    public function setLibelleDuFonction(?string $libelle_du_fonction): self
    {
        $this->libelle_du_fonction = $libelle_du_fonction;

        return $this;
    }

    public function getActif(): ?int
    {
        return $this->actif;
    }

    public function setActif(?int $actif): self
    {
        $this->actif = $actif;

        return $this;
    }
}
