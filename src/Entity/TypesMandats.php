<?php

namespace App\Entity;

use App\Repository\TypesMandatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesMandatsRepository::class)
 */
class TypesMandats
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $ANSVH;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ansvh_lib;


         /**
     * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkANSVH")
     */
    private $mandats;

    public function getANSVH(): ?int
    {
        return $this->ANSVH;
    }

    public function setANSVH(int $ANSVH): self
    {
        $this->ANSVH = $ANSVH;

        return $this;
    }

    public function getAnsvhLib(): ?string
    {
        return $this->ansvh_lib;
    }

    public function setAnsvhLib(?string $ansvh_lib): self
    {
        $this->ansvh_lib = $ansvh_lib;

        return $this;
    }
}
