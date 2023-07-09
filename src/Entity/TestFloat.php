<?php

namespace App\Entity;

use App\Repository\TestFloatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestFloatRepository::class)
 */
class TestFloat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $testF;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestF(): ?float
    {
        return $this->testF;
    }

    public function setTestF(?float $testF): self
    {
        $this->testF = $testF;

        return $this;
    }
}
