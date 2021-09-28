<?php

namespace App\Entity;

use App\Repository\TypePrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePrestationRepository::class)
 */
class TypePrestation
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
     * @ORM\OneToMany(targetEntity=Prestation::class, mappedBy="leTypePrestation")
     */
    private $lesTypesPrestation;

    public function __construct()
    {
        $this->lesTypesPrestation = new ArrayCollection();
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
     * @return Collection|Prestation[]
     */
    public function getLesTypesPrestation(): Collection
    {
        return $this->lesTypesPrestation;
    }

    public function addLesTypesPrestation(Prestation $lesTypesPrestation): self
    {
        if (!$this->lesTypesPrestation->contains($lesTypesPrestation)) {
            $this->lesTypesPrestation[] = $lesTypesPrestation;
            $lesTypesPrestation->setLeTypePrestation($this);
        }

        return $this;
    }

    public function removeLesTypesPrestation(Prestation $lesTypesPrestation): self
    {
        if ($this->lesTypesPrestation->removeElement($lesTypesPrestation)) {
            // set the owning side to null (unless already changed)
            if ($lesTypesPrestation->getLeTypePrestation() === $this) {
                $lesTypesPrestation->setLeTypePrestation(null);
            }
        }

        return $this;
    }
}
