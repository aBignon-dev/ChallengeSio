<?php

namespace App\Entity;

use App\Repository\FlagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlagRepository::class)
 */
class Flag
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
    private $titreQuestion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textQuote;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $textReponse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nID;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="leFlag")
     */
    private $lesReponses;

    public function __construct()
    {
        $this->lesReponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreQuestion(): ?string
    {
        return $this->titreQuestion;
    }

    public function setTitreQuestion(string $titreQuestion): self
    {
        $this->titreQuestion = $titreQuestion;

        return $this;
    }

    public function getTetQuote(): ?string
    {
        return $this->TetQuote;
    }

    public function setTextQuote(string $TetQuote): self
    {
        $this->textQuote = $textQuote;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getTextReponse(): ?string
    {
        return $this->textReponse;
    }

    public function setTextReponse(string $textReponse): self
    {
        $this->textReponse = $textReponse;

        return $this;
    }

    public function getNID(): ?int
    {
        return $this->nID;
    }

    public function setNID(int $nID): self
    {
        $this->nID = $nID;

        return $this;
    }

    /**
     * @return Collection|Reponse[]
     */
    public function getLesReponses(): Collection
    {
        return $this->lesReponses;
    }

    public function addLesReponse(Reponse $lesReponse): self
    {
        if (!$this->lesReponses->contains($lesReponse)) {
            $this->lesReponses[] = $lesReponse;
            $lesReponse->setLeFlag($this);
        }

        return $this;
    }

    public function removeLesReponse(Reponse $lesReponse): self
    {
        if ($this->lesReponses->removeElement($lesReponse)) {
            // set the owning side to null (unless already changed)
            if ($lesReponse->getLeFlag() === $this) {
                $lesReponse->setLeFlag(null);
            }
        }

        return $this;
    }
}
