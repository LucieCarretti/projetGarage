<?php

namespace App\Controller;

use App\Repository\AvisClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;

class HomeController extends AbstractController
{
    private $avisClientsRepository;

    public function __construct(
        AvisClientsRepository $avisClientsRepository
    ) {
        $this->avisClientsRepository = $avisClientsRepository;
    }

    #[Route('/', name: 'home')]
    // paramètre injecter directement par doctrine
    public function index(
        /**DocumentManager $dm**/
    ): Response
    {
        //  // Récupérer l'ensemble des avis depuis la base de données et va mapper avec la l'entité créer la class avis.php
        //  $avisRepository = $dm->getRepository(AvisClients::class);

        // //  on lui demande de tout recuperer et de tout stocker dans une variable $avis (liste ou tableau)
        //  $avis = $avisRepository->findAll();
        
        // $avisRepository = $this->documentManager->getDocumentCollection('AvisClients');
        // $avis = $avisRepository->find();

        // $avis = $this->documentManager->getRepository('App\Document\AvisClients')->findAll();

        $avis = $this->avisClientsRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'avis' => $avis,
        ]);
    }
}

// class HomeController extends AbstractController
// {
//     #[Route('/', name: 'home')]
//     public function index(): Response
//     {
//         return $this->render('home/index.html.twig', [
//             'controller_name' => 'HomeController',
//         ]);
//     }
// }


 // // Créer une instance de Firebase / créer une connexion avec firestore (.json)
        // $firebase = (new Factory)
        //  ->withServiceAccount('./db/projetgarage-f654a-firebase-adminsdk-ne4bg-f2503116fb.json')
        //  ->createDatabase();
        
        //   // Récupérer la référence collection "avis" de firebase
        // $database = $factory->createDatabase();
        // $avisRef = $database->getReference('avis');

        // // Récupérer les données des avis depuis Firestore
        // $snapshot = $avisRef->getSnapshot();
        // $avis = $snapshot->getValue();