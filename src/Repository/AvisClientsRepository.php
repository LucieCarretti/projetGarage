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