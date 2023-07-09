<?php

namespace App\Entity;

use App\Repository\MandatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MandatsRepository::class)
 */
class Mandats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $Id_Mandat;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $PERNR;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $BEGDA;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ENDDA;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $TERMN;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $PA0016_BEGDA;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $PA0016_CTEDT;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ZZCHARGE_H_ADM;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ZZCHARGE_H_OCC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ID_S;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ID_O;

    /**
    * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ETP_ADMIN_POSTE;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $ETP_OCC_POSTE;

    /**
    * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $AFFECT_ETP_SERV;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $relation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $AEDTM;

           /**
     * @ORM\ManyToOne(targetEntity=BaseAgentAdresse::class, inversedBy="PERSONID_EXT")
     * @ORM\JoinColumn(nullable=false, name="FkPERSONID_EXT", referencedColumnName="PERSONID_EXT")
     */
    private $BaseAgentAdresse;

         /**
     * @ORM\ManyToOne(targetEntity=WERKS::class, inversedBy="WERKS")
     * @ORM\JoinColumn(nullable=false, name="FkWERKS", referencedColumnName="WERKS")
     */
    private $WERKS;

       /**
     * @ORM\ManyToOne(targetEntity=BTRTL::class, inversedBy="BTRTL")
     * @ORM\JoinColumn(nullable=true, name="FkBTRTL", referencedColumnName="BTRTL")
     */
    private $BTRTL;

      /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="PERSG")
     * @ORM\JoinColumn(nullable=false,name="FkPERSG", referencedColumnName="PERSG")
     */

    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=PATGS::class, inversedBy="PERSK")
     * @ORM\JoinColumn(nullable=true, name="FkPERSK", referencedColumnName="PERSK")
     */
    private $Patgs;

      /**
     * @ORM\ManyToOne(targetEntity=TypesMandats::class, inversedBy="ANSVH")
     * @ORM\JoinColumn(nullable=false, name="FkANSVH", referencedColumnName="ANSVH")
     */
    private $TypesMandats;

         /**
     * @ORM\ManyToOne(targetEntity=GradeRepresentation::class, inversedBy="ZZREPGRADE")
     * @ORM\JoinColumn(nullable=false, name="FkZZREPGRADE", referencedColumnName="ZZREPGRADE")
     */
    private $Grade_representation;

     /**
     * @ORM\ManyToOne(targetEntity=Academique::class, inversedBy="ZZACAD_ECRAN")
     * @ORM\JoinColumn(nullable=true, name="FkZZACAD_ECRAN", referencedColumnName="ZZACAD_ECRAN")
     */
    private $Academique;


    public function getPERNR(): ?string
    {
        return $this->PERNR;
    }

    public function setPERNR(?string $PERNR): self
    {
        $this->PERNR = $PERNR;

        return $this;
    }
/*
    public function getFkPERSONIDEXT(): ?string
    {
        return $this->Fk_PERSONID_EXT;
    }

    public function setFkPERSONIDEXT(?string $Fk_PERSONID_EXT): self
    {
        $this->Fk_PERSONID_EXT = $Fk_PERSONID_EXT;

        return $this;
    }


        public function getFkWERKS(): ?string
    {
        return $this->Fk_WERKS;
    }

    public function setFkWERKS(?string $Fk_WERKS): self
    {
        $this->Fk_WERKS = $Fk_WERKS;

        return $this;
    }

    public function getFkBTRTL(): ?string
    {
        return $this->Fk_BTRTL;
    }

    public function setFkBTRTL(?string $Fk_BTRTL): self
    {
        $this->Fk_BTRTL = $Fk_BTRTL;

        return $this;
    }

    public function getFkPERSG(): ?string
    {
        return $this->Fk_PERSG;
    }

    public function setFkPERSG(?string $Fk_PERSG): self
    {
        $this->Fk_PERSG = $Fk_PERSG;

        return $this;
    }

    public function getFkPERSK(): ?string
    {
        return $this->Fk_PERSK;
    }

    public function setFkPERSK(?string $Fk_PERSK): self
    {
        $this->Fk_PERSK = $Fk_PERSK;

        return $this;
    }

    public function getFkANSVH(): ?int
    {
        return $this->Fk_ANSVH;
    }

    public function setFkANSVH(?int $Fk_ANSVH): self
    {
        $this->Fk_ANSVH = $Fk_ANSVH;

        return $this;
    }

    public function getFkZZREPGRADE(): ?string
    {
        return $this->Fk_ZZREPGRADE;
    }

    public function setFkZZREPGRADE(?string $Fk_ZZREPGRADE): self
    {
        $this->Fk_ZZREPGRADE = $Fk_ZZREPGRADE;

        return $this;
    }

    public function getFkZZACADECRAN(): ?string
    {
        return $this->Fk_ZZACAD_ECRAN;
    }

    public function setFkZZACADECRAN(?string $Fk_ZZACAD_ECRAN): self
    {
        $this->Fk_ZZACAD_ECRAN = $Fk_ZZACAD_ECRAN;

        return $this;
    }
*/
    public function getBEGDA(): ?\DateTimeInterface
    {
        return $this->BEGDA;
    }

    public function setBEGDA(?\DateTimeInterface $BEGDA): self
    {
        $this->BEGDA = $BEGDA;

        return $this;
    }

    public function getENDDA(): ?\DateTimeInterface
    {
        return $this->ENDDA;
    }

    public function setENDDA(?\DateTimeInterface $ENDDA): self
    {
        $this->ENDDA = $ENDDA;

        return $this;
    }

    public function getTERMN(): ?\DateTimeInterface
    {
        return $this->TERMN;
    }

    public function setTERMN(?\DateTimeInterface $TERMN): self
    {
        $this->TERMN = $TERMN;

        return $this;
    }

    public function getPA0016BEGDA(): ?\DateTimeInterface
    {
        return $this->PA0016_BEGDA;
    }

    public function setPA0016BEGDA(?\DateTimeInterface $PA0016_BEGDA): self
    {
        $this->PA0016_BEGDA = $PA0016_BEGDA;

        return $this;
    }

    public function getPA0016CTEDT(): ?\DateTimeInterface
    {
        return $this->PA0016_CTEDT;
    }

    public function setPA0016CTEDT(?\DateTimeInterface $PA0016_CTEDT): self
    {
        $this->PA0016_CTEDT = $PA0016_CTEDT;

        return $this;
    }

    public function getZZCHARGEHADM(): ?string
    {
        return $this->ZZCHARGE_H_ADM;
    }

    public function setZZCHARGEHADM(?string $ZZCHARGE_H_ADM): self
    {
        $this->ZZCHARGE_H_ADM = $ZZCHARGE_H_ADM;

        return $this;
    }

    public function getZZCHARGEHOCC(): ?string
    {
        return $this->ZZCHARGE_H_OCC;
    }

    public function setZZCHARGEHOCC(?string $ZZCHARGE_H_OCC): self
    {
        $this->ZZCHARGE_H_OCC = $ZZCHARGE_H_OCC;

        return $this;
    }

    public function getIDS(): ?int
    {
        return $this->ID_S;
    }

    public function setIDS(?int $ID_S): self
    {
        $this->ID_S = $ID_S;

        return $this;
    }

    public function getIDO(): ?int
    {
        return $this->ID_O;
    }

    public function setIDO(?int $ID_O): self
    {
        $this->ID_O = $ID_O;

        return $this;
    }

    public function getETPADMINPOSTE(): ?string
    {
        return $this->ETP_ADMIN_POSTE;
    }

    public function setETPADMINPOSTE(?string $ETP_ADMIN_POSTE): self
    {
        $this->ETP_ADMIN_POSTE = $ETP_ADMIN_POSTE;

        return $this;
    }

    public function getETPOCCPOSTE(): ?string
    {
        return $this->ETP_OCC_POSTE;
    }

    public function setETPOCCPOSTE(?string $ETP_OCC_POSTE): self
    {
        $this->ETP_OCC_POSTE = $ETP_OCC_POSTE;

        return $this;
    }

    public function getAFFECTETPSERV(): ?string
    {
        return $this->AFFECT_ETP_SERV;
    }

    public function setAFFECTETPSERV(?string $AFFECT_ETP_SERV): self
    {
        $this->AFFECT_ETP_SERV = $AFFECT_ETP_SERV;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(?string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getAEDTM(): ?\DateTimeInterface
    {
        return $this->AEDTM;
    }

    public function setAEDTM(?\DateTimeInterface $AEDTM): self
    {
        $this->AEDTM = $AEDTM;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getPatgs(): ?PATGS
    {
        return $this->Patgs;
    }

    public function setPatgs(?PATGS $Patgs): self
    {
        $this->Patgs = $Patgs;

        return $this;
    }
}
