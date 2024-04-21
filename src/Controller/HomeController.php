<?php

namespace App\Controller;

use App\Entity\Voiture; //Pour l'affichage de l'entité voiture en front
use App\Repository\AvisClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface; //Pour l'affichage de l'entité voiture en front

class HomeController extends AbstractController
{
    private $avisClientsRepository;
    //Pour l'affichage de l'entité voiture en front
    private $entityManager;

    public function __construct(
        AvisClientsRepository $avisClientsRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->avisClientsRepository = $avisClientsRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    // paramètre injecter directement par doctrine
    public function index(): Response
    {

        //Pour l'affichage de l'entité voiture en front
        $repository = $this->entityManager->getRepository(Voiture::class);
        $voitures = $repository->findAll();

        //récupération des avis nosql
        $avis = $this->avisClientsRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voiture' => $voitures, //Pour l'affichage de l'entité voiture en front
            'avis' => $avis,
        ]);
    }
}