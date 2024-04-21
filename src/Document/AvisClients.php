<?php


namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document(collection="avis")
 */
class AvisClients 
{
    /**
     * @MongoDB\Id()
     */
    private string $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private string $nom;

    /**
     * @MongoDB\Field(type="string")
     */
    private string $prenom;

    /**
     * @MongoDB\Field(type="string", length=255)
     */
    private string $contenu;

    /**
     * @MongoDB\Field(type="integer")
     */
    private int $etoiles;

    /**
     * @MongoDB\Field(type="boolean")
     */
    private bool $affiche;

    public function getId(): string
    {
        return $this->id;
    }

    // déclare une fonction public (qui est accessible de partout en gros) que t'appel getNom et qui retourne un string
    // Dedans tu fais un return de l'objet actuel (this) et tu recupere l'element nom

    public function getNom(): string
    {
        return $this->nom;
    }

    // tu déclare une fonction public que t'appelle setNom, qui prend en parametre un string $nom et qui retourne un type AvisClients (le type de ta class) 
    // Dedans tu définis que l'element nom de l'objet actuel $this est maintenant égal a la variable $nom passé en parametre
    // puis tu retourne l'objet actuel

    public function setNom(string $nom): AvisClients
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): AvisClients
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): AvisClients
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getEtoiles(): int
    {
        return $this->etoiles;
    }

    public function setEtoiles(int $etoiles): AvisClients
    {
        $this->etoiles = $etoiles;

        return $this;
    }

    public function getAffiche(): bool
    {
        return $this->affiche;
    }

    public function setAffiche(bool $affiche): AvisClients
    {
        $this->affiche = $affiche;

        return $this;
    }
}
