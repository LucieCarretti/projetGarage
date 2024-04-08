<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column]
    private ?int $anneeCirculation = null;

    #[ORM\Column(nullable: true)]
    private ?int $places = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $boiteVitesse = null;

    #[ORM\Column]
    private ?float $km = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carburant = null;

    #[ORM\Column]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getAnneeCirculation(): ?int
    {
        return $this->anneeCirculation;
    }

    public function setAnneeCirculation(int $anneeCirculation): static
    {
        $this->anneeCirculation = $anneeCirculation;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(?int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getBoiteVitesse(): ?string
    {
        return $this->boiteVitesse;
    }

    public function setBoiteVitesse(?string $boiteVitesse): static
    {
        $this->boiteVitesse = $boiteVitesse;

        return $this;
    }

    public function getKm(): ?float
    {
        return $this->km;
    }

    public function setKm(float $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): static
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
