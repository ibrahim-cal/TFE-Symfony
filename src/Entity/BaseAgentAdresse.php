<?php

namespace App\Entity;

use App\Repository\BaseAgentAdresseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BaseAgentAdresseRepository::class)
 */
class BaseAgentAdresse
{

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     */
    private $PERSONID_EXT;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $ZRSZRR;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Prenom_pref;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Nom_pref;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $Doc;

                    /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkPERSONID_EXT")
     */
    private $mandats;


     /**
     * @ORM\ManyToOne(targetEntity=Localite::class, inversedBy="id")
     * @ORM\JoinColumn(nullable=false, name="FkLocalite", referencedColumnName="id")
     */
    private $Localite;

    /**
     * @ORM\ManyToOne(targetEntity=AgentFonction::class, inversedBy="ZZGRADE")
     * @ORM\JoinColumn(nullable=false, name="FkAgent_Fonction", referencedColumnName="ZZGRADE")
     */
    private $AgentFonction;

            /**
     *    @ORM\ManyToMany(targetEntity=Unit::class)
     *    @ORM\JoinTable(name="BaseAgentAdresse_Unit",
     *    joinColumns={@ORM\JoinColumn(name="BaseAgentAdresse_id",   
     *    referencedColumnName="PERSONID_EXT")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="Unit_id",     
     *    referencedColumnName="IDUNIT")}
     *    )
     */
    private $units;

     /**
     *    @ORM\ManyToMany(targetEntity=AgentService::class)
     *    @ORM\JoinTable(name="BaseAgentAdresse_AgentService",
     *    joinColumns={@ORM\JoinColumn(name="BaseAgentAdresse_id",   
     *    referencedColumnName="PERSONID_EXT")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="AgentService_id",     
     *    referencedColumnName="SHORT_SERV")}
     *    )
     */
    private $AgentService;

      /**
     * @ORM\ManyToOne(targetEntity=AgentCpi::class, inversedBy="CPI_SERV")
     * @ORM\JoinColumn(nullable=false, name="FkAgent_Cpi", referencedColumnName="CPI_SERV")
     */
    private $AgentCpi;


            /**
     * @ORM\OneToOne(targetEntity=Zchercheur::class,mappedBy="FkBaseAgentAdresse")
     */
    private $Zchercheur;


    public function getPERSONIDEXT(): ?string
    {
        return $this->PERSONID_EXT;
    }

    public function setPERSONIDEXT(string $PERSONID_EXT): self
    {
        $this->PERSONID_EXT = $PERSONID_EXT;

        return $this;
    }
/*
    public function getFkLocalite(): ?int
    {
        return $this->Fk_Localite;
    }

    public function setFkLocalite(?int $Fk_Localite): self
    {
        $this->Fk_Localite = $Fk_Localite;

        return $this;
    }


    public function getFkAgentFonction(): ?string
    {
        return $this->Fk_Agent_Fonction;
    }

    public function setFkAgentFonction(?string $Fk_Agent_Fonction): self
    {
        $this->Fk_Agent_Fonction = $Fk_Agent_Fonction;

        return $this;
    }

    public function getFkUnit(): ?string
    {
        return $this->Fk_Unit;
    }

    public function setFkUnit(?string $Fk_Unit): self
    {
        $this->Fk_Unit = $Fk_Unit;

        return $this;
    }


    public function getFkAgentService(): ?string
    {
        return $this->Fk_Agent_Service;
    }

    public function setFkAgentService(?string $Fk_Agent_Service): self
    {
        $this->Fk_Agent_Service = $Fk_Agent_Service;

        return $this;
    }

    public function getFkAgentCpi(): ?string
    {
        return $this->Fk_Agent_Cpi;
    }

    public function setFkAgentCpi(?string $Fk_Agent_Cpi): self
    {
        $this->Fk_Agent_Cpi = $Fk_Agent_Cpi;

        return $this;
    }
*/
    public function getZRSZRR(): ?string
    {
        return $this->ZRSZRR;
    }

    public function setZRSZRR(?string $ZRSZRR): self
    {
        $this->ZRSZRR = $ZRSZRR;

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

    public function getPrenomPref(): ?string
    {
        return $this->Prenom_pref;
    }

    public function setPrenomPref(?string $Prenom_pref): self
    {
        $this->Prenom_pref = $Prenom_pref;

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

    public function getNomPref(): ?string
    {
        return $this->Nom_pref;
    }

    public function setNomPref(?string $Nom_pref): self
    {
        $this->Nom_pref = $Nom_pref;

        return $this;
    }

    public function getDoc(): ?string
    {
        return $this->Doc;
    }

    public function setDoc(?string $Doc): self
    {
        $this->Doc = $Doc;

        return $this;
    }
}
