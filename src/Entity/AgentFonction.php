<?php

namespace App\Entity;

use App\Repository\AgentFonctionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentFonctionRepository::class)
 */
class AgentFonction
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20)
     */
    private $ZZGRADE;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ZZGRADE_TXT;


     /**
     * @ORM\OneToMany(targetEntity=BaseAgentAdresse::class,mappedBy="FkAgent_Fonction")
     */
    private $BaseAgentAdresse;


      /**
     * @ORM\OneToOne(targetEntity=Fonction::class, inversedBy="id_fonction")
     * @ORM\JoinColumn(nullable=true, name="FkFonction", referencedColumnName="id_fonction")
     */
    private $Fonction;


    public function getZZGRADE(): ?string
    {
        return $this->ZZGRADE;
    }

    public function setZZGRADE(string $ZZGRADE): self
    {
        $this->ZZGRADE = $ZZGRADE;

        return $this;
    }

    public function getZZGRADETXT(): ?string
    {
        return $this->ZZGRADE_TXT;
    }

    public function setZZGRADETXT(string $ZZGRADE_TXT): self
    {
        $this->ZZGRADE_TXT = $ZZGRADE_TXT;

        return $this;
    }
}
