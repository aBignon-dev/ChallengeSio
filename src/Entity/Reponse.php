<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponseRepository::class)
 */
    class Reponse
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;
    
        /**
         * @ORM\Column(type="integer")
         */
        private $nbTentative;
    
        /**
         * @ORM\Column(type="datetime")
         */
        private $heureDebut;
    
        /**
         * @ORM\Column(type="datetime")
         */
        private $heureFin;
    
        /**
         * @ORM\Column(type="boolean")
         */
        private $reussie;
    
        /**
         * @ORM\Column(type="integer")
         */
        private $nbIndices;

        /**
         * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="lesreponses")
         */
        private $lequipe;

        /**
         * @ORM\ManyToOne(targetEntity=Flag::class, inversedBy="lesreponses")
         */
        private $leflag;


       
        public function getId(): ?int
        {
            return $this->id;
        }
    
        public function getNbTentative(): ?int
        {
            return $this->nbTentative;
        }
    
        public function setNbTentative(int $nbTentative): self
        {
            $this->nbTentative = $nbTentative;
    
            return $this;
        }
    
        public function getHeureDebut(): ?\DateTimeInterface
        {
            return $this->heureDebut;
        }
    
        public function setHeureDebut(\DateTimeInterface $heureDebut): self
        {
            $this->heureDebut = $heureDebut;
    
            return $this;
        }
    
        public function getHeureFin(): ?\DateTimeInterface
        {
            return $this->heureFin;
        }
    
        public function setHeureFin(\DateTimeInterface $heureFin): self
        {
            $this->heureFin = $heureFin;
    
            return $this;
        }
    
        public function getReussie(): ?bool
        {
            return $this->reussie;
        }
    
        public function setReussie(bool $reussie): self
        {
            $this->reussie = $reussie;
    
            return $this;
        }
    
        public function getNbIndices(): ?int
        {
            return $this->nbIndices;
        }
    
        public function setNbIndices(int $nbIndices): self
        {
            $this->nbIndices = $nbIndices;
    
            return $this;
        }

        public function getLequipe(): ?Equipe
        {
            return $this->lequipe;
        }

        public function setLequipe(?Equipe $lequipe): self
        {
            $this->lequipe = $lequipe;

            return $this;
        }

        public function getLeflag(): ?Flag
        {
            return $this->leflag;
        }

        public function setLeflag(?Flag $leflag): self
        {
            $this->leflag = $leflag;

            return $this;
        }
  
    }
