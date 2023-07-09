<?php

namespace App\Entity;

use App\Repository\ZchercheurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZchercheurRepository::class)
 */
class Zchercheur
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $Idche;

    /**
     * @ORM\Column(type="string", length=130, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $Titre;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $CPI;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Fax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Site;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Corps;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CorpsOrdre;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DDig;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $FacChe;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $PrefPublication;

          /**
     * @ORM\OneToMany(targetEntity=Zpresponsable::class, mappedBy="Zchercheurs")
     */
    private $Zpresponsable;

        /**
      * @ORM\OneToMany(targetEntity=Zucompos::class, mappedBy="Zchercheurs")
     */
    private $Zucompos;


             /**
     * @ORM\OneToOne(targetEntity=BaseAgentAdresse::class, inversedBy="PERSONID_EXT")
     * @ORM\JoinColumn(nullable=true, name="FkBaseAgentAdresse", referencedColumnName="PERSONID_EXT")
     */
    private $BaseAgentAdresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdche(): ?int
    {
        return $this->Idche;
    }

    public function setIdche(int $Idche): self
    {
        $this->Idche = $Idche;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(?string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getCPI(): ?string
    {
        return $this->CPI;
    }

    public function setCPI(?string $CPI): self
    {
        $this->CPI = $CPI;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->Site;
    }

    public function setSite(?string $Site): self
    {
        $this->Site = $Site;

        return $this;
    }

    public function getCorps(): ?string
    {
        return $this->Corps;
    }

    public function setCorps(?string $Corps): self
    {
        $this->Corps = $Corps;

        return $this;
    }

    public function getCorpsOrdre(): ?int
    {
        return $this->CorpsOrdre;
    }

    public function setCorpsOrdre(?int $CorpsOrdre): self
    {
        $this->CorpsOrdre = $CorpsOrdre;

        return $this;
    }

    public function getDDig(): ?\DateTimeInterface
    {
        return $this->DDig;
    }

    public function setDDig(?\DateTimeInterface $DDig): self
    {
        $this->DDig = $DDig;

        return $this;
    }

    public function getFacChe(): ?string
    {
        return $this->FacChe;
    }

    public function setFacChe(?string $FacChe): self
    {
        $this->FacChe = $FacChe;

        return $this;
    }

    public function getPrefPublication(): ?string
    {
        return $this->PrefPublication;
    }

    public function setPrefPublication(?string $PrefPublication): self
    {
        $this->PrefPublication = $PrefPublication;

        return $this;
    }
}
