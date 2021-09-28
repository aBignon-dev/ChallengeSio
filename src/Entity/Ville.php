<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="laville")
     */
    private $lesclients;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="lesvilles")
     */
    private $ledepartement;

    public function __construct()
    {
        $this->lesclients = new ArrayCollection();
    }

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

    /**
     * @return Collection|Client[]
     */
    public function getLesclients(): Collection
    {
        return $this->lesclients;
    }

    public function addLesclient(Client $lesclient): self
    {
        if (!$this->lesclients->contains($lesclient)) {
            $this->lesclients[] = $lesclient;
            $lesclient->setLaville($this);
        }

        return $this;
    }

    public function removeLesclient(Client $lesclient): self
    {
        if ($this->lesclients->removeElement($lesclient)) {
            // set the owning side to null (unless already changed)
            if ($lesclient->getLaville() === $this) {
                $lesclient->setLaville(null);
            }
        }

        return $this;
    }

    public function getLedepartement(): ?Departement
    {
        return $this->ledepartement;
    }

    public function setLedepartement(?Departement $ledepartement): self
    {
        $this->ledepartement = $ledepartement;

        return $this;
    }
}
