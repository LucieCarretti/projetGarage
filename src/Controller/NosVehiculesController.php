<?php

namespace App\Controller;

use App\Entity\Voiture; //Pour l'affichage de l'entité voiture en front

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

    #[Route('http://garage-vparrot.asso-fac.com/vehicules', name: 'vehicules')]
    public function index(): Response
    {
        //Pour l'affichage de l'entité voiture en front
        $repository = $this->entityManager->getRepository(Voiture::class);
        $voitures = $repository->findAll();

        return $this->render('nos_vehicules/index.html.twig', [
            'voiture' => $voitures, //Pour l'affichage de l'entité voiture en front
            'controller_name' => 'NosVehiculesController',
        ]);
    }
}