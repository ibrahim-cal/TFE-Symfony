<?php

namespace App\Entity;

use App\Repository\AgentCpiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentCpiRepository::class)
 */
class AgentCpi
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $CPI_SERV;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $CPI_SERV_LIBEL;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $CPI_SERV_CAMPUS;


                     /**
     * @ORM\OneToMany(targetEntity=BaseAgentAdresse::class,mappedBy="FkAgent_Cpi")
     */
    private $BaseAgentAdresse;
    

    public function getCPISERV(): ?string
    {
        return $this->CPI_SERV;
    }

    public function setCPISERV(?string $CPI_SERV): self
    {
        $this->CPI_SERV = $CPI_SERV;

        return $this;
    }

    public function getCPISERVLIBEL(): ?string
    {
        return $this->CPI_SERV_LIBEL;
    }

    public function setCPISERVLIBEL(?string $CPI_SERV_LIBEL): self
    {
        $this->CPI_SERV_LIBEL = $CPI_SERV_LIBEL;

        return $this;
    }

    public function getCPISERVCAMPUS(): ?string
    {
        return $this->CPI_SERV_CAMPUS;
    }

    public function setCPISERVCAMPUS(?string $CPI_SERV_CAMPUS): self
    {
        $this->CPI_SERV_CAMPUS = $CPI_SERV_CAMPUS;

        return $this;
    }
}
