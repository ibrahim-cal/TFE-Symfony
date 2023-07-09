<?php

namespace App\Entity;

use App\Repository\PATGSRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PATGSRepository::class)
 */
class PATGS
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $PERSK;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $PERSKLIB;

     /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkPERSK")
     */
    private $mandats;

    public function __construct()
    {
        $this->mandats = new ArrayCollection();
    }

    public function getPERSK(): ?string
    {
        return $this->PERSK;
    }

    public function setPERSK(?string $PERSK): self
    {
        $this->PERSK = $PERSK;

        return $this;
    }

    public function getPERSKLIB(): ?string
    {
        return $this->PERSKLIB;
    }

    public function setPERSKLIB(?string $PERSKLIB): self
    {
        $this->PERSKLIB = $PERSKLIB;

        return $this;
    }

    /**
     * @return Collection|Mandats[]
     */
    public function getMandats(): Collection
    {
        return $this->mandats;
    }

    public function addMandat(Mandats $mandat): self
    {
        if (!$this->mandats->contains($mandat)) {
            $this->mandats[] = $mandat;
            $mandat->setPatgs($this);
        }

        return $this;
    }

    public function removeMandat(Mandats $mandat): self
    {
        if ($this->mandats->removeElement($mandat)) {
            // set the owning side to null (unless already changed)
            if ($mandat->getPatgs() === $this) {
                $mandat->setPatgs(null);
            }
        }

        return $this;
    }
}
