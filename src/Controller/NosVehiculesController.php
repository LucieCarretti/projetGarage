<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NosVehiculesController extends AbstractController
{
    #[Route('/vehicules', name: 'vehicules')]
    public function index(): Response
    {
        return $this->render('nos_vehicules/index.html.twig', [
            'controller_name' => 'NosVehiculesController',
        ]);
    }
}
