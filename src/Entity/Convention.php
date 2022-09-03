<?php

namespace App\Entity;

use App\Repository\ConventionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConventionRepository::class)]
class Convention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbHeur = null;

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

    public function getNbHeur(): ?int
    {
        return $this->nbHeur;
    }

    public function setNbHeur(int $nbHeur): self
    {
        $this->nbHeur = $nbHeur;

        return $this;
    }
}
