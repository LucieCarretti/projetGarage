<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Exception;
use MongoDB\Client;
use App\Document\Avis;
use Doctrine\ODM\MongoDB\DocumentManager;

class ClientController extends AbstractController
{
    private $uri = 'mongodb+srv://mongodb:Waayose3Yka31SMx@cluster0.6vaf4bd.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0';

    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {

        $client = new Client($this->uri);

         try {
            // Send a ping to confirm a successful connection
            $client->selectDatabase('projetGarage')->command(['ping' => 1]);
            echo "Pinged your deployment. You successfully connected to MongoDB!\n";
        } catch (Exception $e) {
            printf($e->getMessage());
        }

        return $this->render('client/index.html.twig');
}

}
    
