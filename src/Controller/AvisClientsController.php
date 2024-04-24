<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AvisClientsRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Document\AvisClients;

class AvisClientsController extends AbstractController
{

    private $avisClientsRepository;

    public function __construct(
        AvisClientsRepository $avisClientsRepository,
    ) {
        $this->avisClientsRepository = $avisClientsRepository;
    }

    #[Route('/avis/clients', name: 'app_avis_clients')]
    public function index(Request $request): Response
    {
        $avis = $this->avisClientsRepository->findAll();

        return $this->render('avis_clients/index.html.twig', [
            'controller_name' => 'AvisClientsController',
            'avisClients' => $avis,
        ]);
    }

    #[Route('/avis/clients/edit/{id}', name: 'avis_clients_edit')]
    public function edit(Request $request, $id): Response
    {
        $avis = $this->avisClientsRepository->toggleAffiche($id);

        return $this->redirectToRoute('app_avis_clients', [], Response::HTTP_SEE_OTHER);

    }

    #[Route('/avis/clients/delete/{id}', name: 'avis_clients_delete')]
    public function delete(Request $request, $id): Response
    {
        $avis = $this->avisClientsRepository->delete($id);

        return $this->redirectToRoute('app_avis_clients', [], Response::HTTP_SEE_OTHER);

    }
}