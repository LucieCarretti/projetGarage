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

    public function findById($id)
    {
        return $this->documentManager->getRepository(AvisClients::class)->findBy(['id' => $id])[0];
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

    public function insert($nom, $prenom, $contenu): void
    // on créer un objet Avis Clients et de cet avis on set les champs avec les input qu'on a récupéré
    {
        $avisClient = new AvisClients();
        $avisClient->setNom($nom);
        $avisClient->setPrenom($prenom);
        $avisClient->setContenu($contenu);
        $avisClient->setEtoiles(0);
        $avisClient->setAffiche(false);
       

        $this->documentManager->persist($avisClient);
        $this->documentManager->flush();
    }

    public function toggleAffiche($id): void
    // permet de récupérer l'avis lié à l'id $id et met l'etat inverse de l'attribut affiche : true <=> false
    {
        $avis = $this->findById($id);

        $avis->setAffiche(!$avis->getAffiche());

        //technique if
        // $affiche_current = $avis->getAffiche();
        // if ($affiche_current === true) {
        //     $avis->setAffiche(false);
        // }
        // else {
        //     $avis->setAffiche(true);
        // }

        //technique inline
        // $avis->setAffiche(!$avis->getAffiche());

        $this->documentManager->flush(); //valide les changements dans la base de donnée noSQL
    }

   public function delete($id): void
   {
        $avis = $this->findById($id);   //recupere l'avis concerné

        $this->documentManager->remove($avis); //supprime l'avis en "local"

        $this->documentManager->flush(); // valide les changements sur la bdd
   }

}

?>