<?php

namespace App\Entity;

use App\Repository\FlagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

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
     * @ORM\Column(type="text")
     */
    private $titreQuestion; 
    public static function loadValidatorMetadataTitreQuestion(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('titreQuestion', new NotBlank());
    }

    /**
     * @ORM\Column(type="text")
     */
    private $textQuote;
    public static function loadValidatorMetadataTextQuote(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('textQuote', new NotBlank());
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="text")
     */
    private $textReponse;
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('textReponse', new NotBlank());
    }


    /**
     * @ORM\Column(type="integer")
     */
    private $nID;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="leflag")
     */
    private $lesreponses;

    

    public function __construct()
    {
        $this->lesreponses = new ArrayCollection();
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

    public function getTextQuote(): ?string
    {
        return $this->textQuote;
    }

    public function setTextQuote(string $textQuote): self
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
    public function getLesreponses(): Collection
    {
        return $this->lesreponses;
    }

    public function addLesreponse(Reponse $lesreponse): self
    {
        if (!$this->lesreponses->contains($lesreponse)) {
            $this->lesreponses[] = $lesreponse;
            $lesreponse->setLeflag($this);
        }

        return $this;
    }

    public function removeLesreponse(Reponse $lesreponse): self
    {
        if ($this->lesreponses->removeElement($lesreponse)) {
            // set the owning side to null (unless already changed)
            if ($lesreponse->getLeflag() === $this) {
                $lesreponse->setLeflag(null);
            }
        }

        return $this;
    }

    
}
