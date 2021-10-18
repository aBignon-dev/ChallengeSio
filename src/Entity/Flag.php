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
    private $TextQuote;

    /**
     * @ORM\Column(type="integer")
     */
    private $Points;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TextReponse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TitreQuestion;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="lesreponse")
     */
    private $leflag;

    public function __construct()
    {
        $this->leflag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextQuote(): ?string
    {
        return $this->TextQuote;
    }

    public function setTextQuote(string $TextQuote): self
    {
        $this->TextQuote = $TextQuote;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->Points;
    }

    public function setPoints(int $Points): self
    {
        $this->Points = $Points;

        return $this;
    }

    public function getTextReponse(): ?string
    {
        return $this->TextReponse;
    }

    public function setTextReponse(string $TextReponse): self
    {
        $this->TextReponse = $TextReponse;

        return $this;
    }

    public function getTitreQuestion(): ?string
    {
        return $this->TitreQuestion;
    }

    public function setTitreQuestion(string $TitreQuestion): self
    {
        $this->TitreQuestion = $TitreQuestion;

        return $this;
    }

    /**
     * @return Collection|Reponse[]
     */
    public function getLeflag(): Collection
    {
        return $this->leflag;
    }

    public function addLeflag(Reponse $leflag): self
    {
        if (!$this->leflag->contains($leflag)) {
            $this->leflag[] = $leflag;
            $leflag->setLesreponse($this);
        }

        return $this;
    }

    public function removeLeflag(Reponse $leflag): self
    {
        if ($this->leflag->removeElement($leflag)) {
            // set the owning side to null (unless already changed)
            if ($leflag->getLesreponse() === $this) {
                $leflag->setLesreponse(null);
            }
        }

        return $this;
    }
}
