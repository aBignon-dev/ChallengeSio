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
     * @ORM\Column(type="boolean")
     */
    private $equipeComplete;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="lequipe")
     */
    private $lesUsers;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="lequipe")
     */
    private $laReponse;

    public function __construct()
    {
        $this->lesUsers = new ArrayCollection();
        $this->laReponse = new ArrayCollection();
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

    public function getEquipeComplete(): ?bool
    {
        return $this->equipeComplete;
    }

    public function setEquipeComplete(bool $equipeComplete): self
    {
        $this->equipeComplete = $equipeComplete;

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
    public function getLaReponse(): Collection
    {
        return $this->laReponse;
    }

    public function addLaReponse(reponse $laReponse): self
    {
        if (!$this->laReponse->contains($laReponse)) {
            $this->laReponse[] = $laReponse;
            $laReponse->setLequipe($this);
        }

        return $this;
    }

    public function removeLaReponse(reponse $laReponse): self
    {
        if ($this->laReponse->removeElement($laReponse)) {
            // set the owning side to null (unless already changed)
            if ($laReponse->getLequipe() === $this) {
                $laReponse->setLequipe(null);
            }
        }

        return $this;
    }
}
