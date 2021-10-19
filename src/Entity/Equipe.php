<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="lequipe")
     */
    private $lesUsers;

    /**
     * @ORM\OneToMany(targetEntity=reponse::class, mappedBy="lequipe")
     */
    private $lesReponses;

    public function __construct()
    {
        $this->lesUsers = new ArrayCollection();
        $this->lesReponses = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getLesUsers(): Collection
    {
        return $this->lesUsers;
    }

    public function addLesUser(User $lesUser): self
    {
        if (!$this->lesUsers->contains($lesUser)) {
            $this->lesUsers[] = $lesUser;
            $lesUser->setLequipe($this);
        }

        return $this;
    }

    public function removeLesUser(User $lesUser): self
    {
        if ($this->lesUsers->removeElement($lesUser)) {
            // set the owning side to null (unless already changed)
            if ($lesUser->getLequipe() === $this) {
                $lesUser->setLequipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|reponse[]
     */
    public function getLesReponses(): Collection
    {
        return $this->lesReponses;
    }

    public function addLesReponse(reponse $lesReponse): self
    {
        if (!$this->lesReponses->contains($lesReponse)) {
            $this->lesReponses[] = $lesReponse;
            $lesReponse->setLequipe($this);
        }

        return $this;
    }

    public function removeLesReponse(reponse $lesReponse): self
    {
        if ($this->lesReponses->removeElement($lesReponse)) {
            // set the owning side to null (unless already changed)
            if ($lesReponse->getLequipe() === $this) {
                $lesReponse->setLequipe(null);
            }
        }

        return $this;
    }
}
