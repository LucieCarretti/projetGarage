<?php

namespace App\Controller;

use App\Entity\Voiture; //Pour l'affichage de l'entité voiture en front
use App\Entity\Horaires;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface; //Pour l'affichage de l'entité voiture en front

class NosVehiculesController extends AbstractController
{
    //Pour l'affichage de l'entité voiture en front
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/vehicules', name: 'vehicules')]
    public function index(): Response
    {
        //Pour l'affichage de l'entité voiture en front
        $repository = $this->entityManager->getRepository(Voiture::class);
        $voitures = $repository->findAll();

        $repository = $this->entityManager->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        return $this->render('nos_vehicules/index.html.twig', [
            'voiture' => $voitures, //Pour l'affichage de l'entité voiture en front
            'horaire' => $horaires,
            'controller_name' => 'NosVehiculesController',
        ]);
    }
}

// Aide de Caro

    // use Symfony\Component\HttpFoundation\Request; //Etape 1 : Request pour l'affichage de l'entité voiture en front
    // use Symfony\Component\HttpFoundation\Session\SessionInterface; // Etape 1 : pour l'affichage de l'entité voiture en front
    
    // public function index(Request $req, SessionInterface $session): Response #Ca je sais pas trop :')
    // {
    //     $repository = $this->entityManager->getRepository(Voiture::class); #Du coup ici on a une variable reporitsory qui va récupérer la table Voiture
    //     $voitures = $repository->findAll(); #On créer une variable voiture et dedans on va sélécyionner toutes les voitures

    //     return $this->render('home/index.html.twig', [
    //         'voitures' => $voitures, #Puis pour ton twig, tout ce qui est égal à 'voiture' sera du coup la variable voiture
    //     ]);
    // }