<?php

namespace App\Entity;

use App\Repository\AcademiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcademiqueRepository::class)
 */
class Academique
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=5)
     */
    private $ZZACAD_ECRAN;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $ZZACAD_TXT_AUTO;

         /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkZZACAD_ECRAN")
     */
    private $mandats;

    public function getZZACADECRAN(): ?string
    {
        return $this->ZZACAD_ECRAN;
    }

    public function setZZACADECRAN(string $ZZACAD_ECRAN): self
    {
        $this->ZZACAD_ECRAN = $ZZACAD_ECRAN;

        return $this;
    }

    public function getZZACADTXTAUTO(): ?string
    {
        return $this->ZZACAD_TXT_AUTO;
    }

    public function setZZACADTXTAUTO(string $ZZACAD_TXT_AUTO): self
    {
        $this->ZZACAD_TXT_AUTO = $ZZACAD_TXT_AUTO;

        return $this;
    }
}
