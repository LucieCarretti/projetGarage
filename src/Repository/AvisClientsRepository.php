<?php

namespace App\Repository;

use App\Document\AvisClients;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class AvisClientsRepository extends DocumentRepository
{

    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function findAll(): array
    {
        return $this->documentManager->getRepository(AvisClients::class)->findAll();
    }

    public function findByAffiche($affiche): array
    {
        return $this->documentManager->getRepository(AvisClients::class)->findBy(['affiche' => $affiche]);
    }

    public function insert($nom, $prenom, $contenu): void
    // on créer un objet Avis Clients et de cet avis on set les champs avec les input qu'on a récupéré
    {
        $avisClient = new AvisClients();
        $avisClient->setNom($nom);
        $avisClient->setPrenom($prenom);
        $avisClient->setContenu($contenu);
        $avisClient->setAffiche(false);
       

        $this->documentManager->persist($avisClient);
        $this->documentManager->flush();
    }

    // public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array
    // {
    //     return $this->documentManager->getRepository(AvisClients::class)->findBy($criteria);
    // }

    // public function findByNom($nom)
    // {
    //     return $this->documentManager->getRepository(AvisClients::class)->findBy(['nom' => $nom]);
    // }

    // public function findGwenn()
    // {
    //     return $this->documentManager->getRepository(AvisClients::class)->findBy(['prenom' => "gwenn"]);
    // }

}

?>