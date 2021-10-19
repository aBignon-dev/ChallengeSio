<?php

namespace App\Entity;

use App\Repository\DebutPartieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DebutPartieRepository::class)
 */
class DebutPartie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $goStart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoStart(): ?bool
    {
        return $this->goStart;
    }

    public function setGoStart(bool $goStart): self
    {
        $this->goStart = $goStart;

        return $this;
    }
}
