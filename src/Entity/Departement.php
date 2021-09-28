<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
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
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="ledepartement")
     */
    private $lesvilles;

    public function __construct()
    {
        $this->lesvilles = new ArrayCollection();
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
     * @return Collection|Ville[]
     */
    public function getLesvilles(): Collection
    {
        return $this->lesvilles;
    }

    public function addLesville(Ville $lesville): self
    {
        if (!$this->lesvilles->contains($lesville)) {
            $this->lesvilles[] = $lesville;
            $lesville->setLedepartement($this);
        }

        return $this;
    }

    public function removeLesville(Ville $lesville): self
    {
        if ($this->lesvilles->removeElement($lesville)) {
            // set the owning side to null (unless already changed)
            if ($lesville->getLedepartement() === $this) {
                $lesville->setLedepartement(null);
            }
        }

        return $this;
    }
}
