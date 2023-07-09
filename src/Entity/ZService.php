<?php

namespace App\Entity;

use App\Repository\ZServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZServiceRepository::class)
 */
class ZService
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
     * @ORM\OneToOne(targetEntity=AgentService::class,mappedBy="FkZService")
     */
    private $AgentService;


    public function getSHORTSERV(): ?string
    {
     
        return $this->SHORT_SERV;
    }

    public function setSHORTSERV(string $SHORTSERV): self
    {
        $this->SHORTSERV = $SHORTSERV;

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

    public function getAgentService(): ?AgentService
    {
        return $this->AgentService;
    }

    public function setAgentService(?AgentService $AgentService): self
    {
        $this->AgentService = $AgentService;

        return $this;
    }



}
