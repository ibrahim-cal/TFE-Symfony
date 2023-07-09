<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=5)
          */
    private $PERSG;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $PERSGLIB;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sorti;
     /*
      * @ORM\OneToMany(targetEntity=Mandats::class,mappedBy="FkPERSG")
      */
    private $Mandats;


    public function getPERSG(): ?string
    {
        return $this->PERSG;
    }

    public function setPERSG(string $PERSG): self
    {
        $this->PERSG = $PERSG;

        return $this;
    }

    public function getPERSGLIB(): ?string
    {
        return $this->PERSGLIB;
    }

    public function setPERSGLIB(?string $PERSGLIB): self
    {
        $this->PERSGLIB = $PERSGLIB;

        return $this;
    }

    public function getSorti(): ?int
    {
        return $this->sorti;
    }

    public function setSorti(?int $sorti): self
    {
        $this->sorti = $sorti;

        return $this;
    }
}
