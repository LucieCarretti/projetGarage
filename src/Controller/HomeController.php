<?php

namespace App\Controller;

use App\Entity\Voiture; //Pour l'affichage de l'entité voiture en front
use App\Entity\Services;
use App\Repository\AvisClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface; //Pour l'affichage de l'entité voiture en front
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;

use function PHPUnit\Framework\throwException;

class HomeController extends AbstractController
{
    private $avisClientsRepository;
    //Pour l'affichage de l'entité voiture en front
    private $entityManager;

    private $csrfTokenManagerInterface;

    public function __construct(
        AvisClientsRepository $avisClientsRepository,
        EntityManagerInterface $entityManager,
        CsrfTokenManagerInterface $csrfTokenManagerInterface
    ) {
        $this->avisClientsRepository = $avisClientsRepository;
        $this->entityManager = $entityManager;
        $this->csrfTokenManagerInterface = $csrfTokenManagerInterface;
    }

    #[Route('/', name: 'home')]
    // paramètre injecter directement par doctrine
    public function index(Request $request): Response // Inject the Request object
    {
        //Pour l'affichage de l'entité en front
        $repository = $this->entityManager->getRepository(Voiture::class);
        $voitures = $repository->findAll();

        $repository = $this->entityManager->getRepository(Services::class);
        $services = $repository->findAll();

        // verifie que la méthode est bien post
        // gestion du retour du formulaire
        // ajout d'un nouveau champs caché lors du submit du form
        if ($request->isMethod('POST')) {
            $token = $request->request->get("csrf_token"); // recuperation du token du formulaire (.twig)

            //methode constructeur
            // theorie : $variable = new TYPE(parametre, parametre, ...);
            // création d'un objetpour l'envoyer au isTokenValid pour vérifier si le token est utilisable ou pas

            $csrfToken_verif = new CsrfToken("token_avis_id", $token);

            //envoie de l'objet a isTokenValid
            //si le token n'est pas valid : throw exception
            if (! $this->csrfTokenManagerInterface->isTokenValid($csrfToken_verif)) {
                throw new \Exception('Invalid CSRF token');
            }
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $contenu = $request->request->get('contenu');
            
            // appelle la fonction
            $this->avisClientsRepository->insert($nom, $prenom, $contenu);
        }
  
        //remplisssage de la variable token
        //génération d'un token 
        // $csrf_token = $this->csrfTokenManagerInterface->getToken('token_avis_id');
        $csrf_token = $this->csrfTokenManagerInterface->refreshToken('token_avis_id');

        //récupération des avis nosql
        $avis = $this->avisClientsRepository->findByAffiche(true);
        // var_dump ($avis);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voiture' => $voitures, //Pour l'affichage de l'entité voiture en front
            'service' => $services, //Pour l'affichage de l'entité services en front
            'avis' => $avis, //envoie des avis au front
            'csrf_token' => $csrf_token // envoie le token au front
        ]);
    }
}