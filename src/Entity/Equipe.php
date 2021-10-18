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
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="lequipe")
     */
    private $lesuser;

    public function __construct()
    {
        $this->lesuser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getLesuser(): Collection
    {
        return $this->lesuser;
    }

    public function addLesuser(User $lesuser): self
    {
        if (!$this->lesuser->contains($lesuser)) {
            $this->lesuser[] = $lesuser;
            $lesuser->setLequipe($this);
        }

        return $this;
    }

    public function removeLesuser(User $lesuser): self
    {
        if ($this->lesuser->removeElement($lesuser)) {
            // set the owning side to null (unless already changed)
            if ($lesuser->getLequipe() === $this) {
                $lesuser->setLequipe(null);
            }
        }

        return $this;
    }
}
