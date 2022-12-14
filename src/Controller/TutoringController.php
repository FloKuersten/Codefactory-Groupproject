<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutoringController extends AbstractController
{
    #[Route('/tutoring', name: 'app_tutoring')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $todos = $doctrine->getRepository(TutoringController::class)->findAll();

        return $this->render('tutoring/tutoring.html.twig', [
            'controller_name' => 'TutoringController',
        ]);
    }
}
