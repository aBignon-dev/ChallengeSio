<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiteRepository::class)
 */
class Visite
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
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity=Prestation::class, mappedBy="LesPrestations")
     */
    private $lesPrestations;

    public function __construct()
    {
        $this->lesPrestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection|Prestation[]
     */
    public function getLesPrestations(): Collection
    {
        return $this->lesPrestations;
    }

    public function addLesPrestation(Prestation $lesPrestation): self
    {
        if (!$this->lesPrestations->contains($lesPrestation)) {
            $this->lesPrestations[] = $lesPrestation;
            $lesPrestation->setLesPrestations($this);
        }

        return $this;
    }

    public function removeLesPrestation(Prestation $lesPrestation): self
    {
        if ($this->lesPrestations->removeElement($lesPrestation)) {
            // set the owning side to null (unless already changed)
            if ($lesPrestation->getLesPrestations() === $this) {
                $lesPrestation->setLesPrestations(null);
            }
        }

        return $this;
    }
}
