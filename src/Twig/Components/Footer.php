<?php

namespace App\Twig\Components;

use App\Entity\Horaires;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface; //Pour l'affichage de l'entité voiture en front

#[AsTwigComponent]
final class Footer
{
  //Pour l'affichage de l'entité voiture en front
  private $entityManager;

  public function __construct(EntityManagerInterface $entityManager)
  {
      $this->entityManager = $entityManager;
  }

  public function index()//: Response
    {
        //Pour l'affichage de l'entité voiture en front
        $repository = $this->entityManager->getRepository(Horaires::class);
        $horaires = $repository->findAll();

        // return $this->render('Footer.html.twig', [
        //     'horaire' => $horaires, //Pour l'affichage de l'entité voiture en front
        // ]);
    }
}
