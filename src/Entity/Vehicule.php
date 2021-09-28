<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $consommation;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="lesvehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lamarque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getConsommation(): ?int
    {
        return $this->consommation;
    }

    public function setConsommation(int $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getLamarque(): ?Marque
    {
        return $this->lamarque;
    }

    public function setLamarque(?Marque $lamarque): self
    {
        $this->lamarque = $lamarque;

        return $this;
    }

    public function CalculCoutConsommation(int $tarif)
    {
        return $this->consommation *$tarif;
    }
}
