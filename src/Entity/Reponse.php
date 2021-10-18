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
     * @ORM\Column(type="time")
     */
    private $HeureReponse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Reussie;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="lequipe")
     */
    private $lasreponse;

    /**
     * @ORM\ManyToOne(targetEntity=flag::class, inversedBy="leflag")
     */
    private $lesreponse;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;
    
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

    public function getLareponse(): ?Equipe
    {
        return $this->lareponse;
    }

    public function setLareponse(?Equipe $lareponse): self
    {
        $this->lareponse = $lareponse;

        return $this;
    }

    public function getLesreponse(): ?flag
    {
        return $this->lesreponse;
    }

    public function setLesreponse(?flag $lesreponse): self
    {
        $this->lesreponse = $lesreponse;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }
}
