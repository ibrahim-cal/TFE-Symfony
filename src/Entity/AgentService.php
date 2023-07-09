<?php

namespace App\Entity;

use App\Repository\AgentServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentServiceRepository::class)
 */
class AgentService
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20)
     */
    private $SHORT_SERV;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $LONG_SERV;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $LIBEL_SERV;


          /**
     * @ORM\OneToOne(targetEntity=ZService::class, inversedBy="SHORT_SERV")
     * @ORM\JoinColumn(nullable=false, name="FkZService", referencedColumnName="SHORT_SERV")
     */
    private $ZService;

    public function getSHORTSERV(): ?string
    {
        return $this->SHORT_SERV;
    }

    public function setSHORTSERV(string $SHORT_SERV): self
    {
        $this->SHORT_SERV = $SHORT_SERV;

        return $this;
    }

    public function getLONGSERV(): ?string
    {
        return $this->LONG_SERV;
    }

    public function setLONGSERV(?string $LONG_SERV): self
    {
        $this->LONG_SERV = $LONG_SERV;

        return $this;
    }

    public function getLIBELSERV(): ?string
    {
        return $this->LIBEL_SERV;
    }

    public function setLIBELSERV(?string $LIBEL_SERV): self
    {
        $this->LIBEL_SERV = $LIBEL_SERV;

        return $this;
    }

}
