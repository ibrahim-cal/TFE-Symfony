<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnitRepository::class)
 */
class Unit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $IDUNIT;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $IDUNIT_TXT;


          /**
     * @ORM\OneToOne(targetEntity=ZFac::class, inversedBy="Fac")
     * @ORM\JoinColumn(nullable=true, name="FkZFac", referencedColumnName="Fac")
     */
    private $ZFac;


    public function getIDUNIT(): ?string
    {
        return $this->IDUNIT;
    }

    public function setIDUNIT(?string $IDUNIT): self
    {
        $this->IDUNIT = $IDUNIT;

        return $this;
    }

    public function getIDUNITTXT(): ?string
    {
        return $this->IDUNIT_TXT;
    }

    public function setIDUNITTXT(?string $IDUNIT_TXT): self
    {
        $this->IDUNIT_TXT = $IDUNIT_TXT;

        return $this;
    }
}
