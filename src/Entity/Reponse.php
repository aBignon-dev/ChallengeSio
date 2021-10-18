<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseRepository::class)
 */
class Reponse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NbTentative;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureReponse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Reussie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTentative(): ?int
    {
        return $this->NbTentative;
    }

    public function setNbTentative(?int $NbTentative): self
    {
        $this->NbTentative = $NbTentative;

        return $this;
    }

    public function getHeureReponse(): ?\DateTimeInterface
    {
        return $this->HeureReponse;
    }

    public function setHeureReponse(\DateTimeInterface $HeureReponse): self
    {
        $this->HeureReponse = $HeureReponse;

        return $this;
    }

    public function getReussie(): ?bool
    {
        return $this->Reussie;
    }

    public function setReussie(bool $Reussie): self
    {
        $this->Reussie = $Reussie;

        return $this;
    }
}
