<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Kreait\Firebase\Factory;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

class AvisController extends AbstractController
{
    public function afficherAvis()
    {
        // Créer une instance de Firebase / créer la connexion avec le firestore (le .json)
        $firebase = (new Factory)
            ->withServiceAccount('/path/to/your/firebase_credentials.json')
            ->create();
        
        // Récupérer la référence à la collection "avis"
        $database = $firebase->getDatabase();
        $avisRef = $database->getReference('avis');
        
        // Récupérer les données des avis depuis Firestore
        $snapshot = $avisRef->getSnapshot();
        $avis = $snapshot->getValue();
        
        // Passer les données récupérées à la vue
        return $this->render('avis/index.html.twig', [
            'avis' => $avis,
        ]);
    }
}
