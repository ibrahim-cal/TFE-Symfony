<?php

namespace App\Entity;

use App\Repository\GradeRepresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepresentationRepository::class)
 */
class GradeRepresentation
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $ZZREPGRADE;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ZZREPGRADE_TXT;


     /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkZZREPGRADE")
     */
    private $mandats;

    public function getZZREPGRADE(): ?string
    {
        return $this->ZZREPGRADE;
    }

    public function setZZREPGRADE(?string $ZZREPGRADE): self
    {
        $this->ZZREPGRADE = $ZZREPGRADE;

        return $this;
    }

    public function getZZREPGRADETXT(): ?string
    {
        return $this->ZZREPGRADE_TXT;
    }

    public function setZZREPGRADETXT(?string $ZZREPGRADE_TXT): self
    {
        $this->ZZREPGRADE_TXT = $ZZREPGRADE_TXT;

        return $this;
    }
}
