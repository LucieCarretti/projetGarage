<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 255)]
    private ?string $ouverture_AM = null;

    #[ORM\Column(length: 255)]
    private ?string $fermeture_AM = null;

    #[ORM\Column(length: 255)]
    private ?string $ouverture_PM = null;

    #[ORM\Column(length: 255)]
    private ?string $fermeture_PM = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOuvertureAM(): ?string
    {
        return $this->ouverture_AM;
    }

    public function setOuvertureAM(string $ouverture_AM): static
    {
        $this->ouverture_AM = $ouverture_AM;

        return $this;
    }

    public function getFermetureAM(): ?string
    {
        return $this->fermeture_AM;
    }

    public function setFermetureAM(string $fermeture_AM): static
    {
        $this->fermeture_AM = $fermeture_AM;

        return $this;
    }

    public function getOuverturePM(): ?string
    {
        return $this->ouverture_PM;
    }

    public function setOuverturePM(string $ouverture_PM): static
    {
        $this->ouverture_PM = $ouverture_PM;

        return $this;
    }

    public function getFermeturePM(): ?string
    {
        return $this->fermeture_PM;
    }

    public function setFermeturePM(string $fermeture_PM): static
    {
        $this->fermeture_PM = $fermeture_PM;

        return $this;
    }
}
