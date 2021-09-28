<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
     * @ORM\OneToMany(targetEntity=Marque::class, mappedBy="lepays")
     */
    private $lesmarques;

    public function __construct()
    {
        $this->lesmarques = new ArrayCollection();
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
     * @return Collection|Marque[]
     */
    public function getLesmarques(): Collection
    {
        return $this->lesmarques;
    }

    public function addLesmarque(Marque $lesmarque): self
    {
        if (!$this->lesmarques->contains($lesmarque)) {
            $this->lesmarques[] = $lesmarque;
            $lesmarque->setLepays($this);
        }

        return $this;
    }

    public function removeLesmarque(Marque $lesmarque): self
    {
        if ($this->lesmarques->removeElement($lesmarque)) {
            // set the owning side to null (unless already changed)
            if ($lesmarque->getLepays() === $this) {
                $lesmarque->setLepays(null);
            }
        }

        return $this;
    }
}
