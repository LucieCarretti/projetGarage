<?php

namespace App\Controller;

use App\Entity\Horaires;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class ProduitController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/produit', name: 'produit')]
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        return $this->render('produit/index.html.twig', [
            'horaire' => $horaires,
            'controller_name' => 'ProduitController',
        ]);
    }
}