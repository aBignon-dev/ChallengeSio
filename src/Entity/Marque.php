<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
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
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="lamarque")
     */
    private $lesvehicules;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="lesmarques")
     */
    private $lepays;

    public function __construct()
    {
        $this->lesvehicules = new ArrayCollection();
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
     * @return Collection|Vehicule[]
     */
    public function getLesvehicules(): Collection
    {
        return $this->lesvehicules;
    }

    public function addLesvehicule(Vehicule $lesvehicule): self
    {
        if (!$this->lesvehicules->contains($lesvehicule)) {
            $this->lesvehicules[] = $lesvehicule;
            $lesvehicule->setLamarque($this);
        }

        return $this;
    }

    public function removeLesvehicule(Vehicule $lesvehicule): self
    {
        if ($this->lesvehicules->removeElement($lesvehicule)) {
            // set the owning side to null (unless already changed)
            if ($lesvehicule->getLamarque() === $this) {
                $lesvehicule->setLamarque(null);
            }
        }

        return $this;
    }

    public function getLepays(): ?Pays
    {
        return $this->lepays;
    }

    public function setLepays(?Pays $lepays): self
    {
        $this->lepays = $lepays;

        return $this;
    }
}
