<?php

namespace App\Controller;

use App\Entity\Service;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/static', name: 'app_static')]
    public function index(ManagerRegistry $doctrine): Response
    { $service = $doctrine->getRepository(Service::class)->findAll();
        return $this->render('static/index.html.twig', [
            'service' => $service,
        ]);
    }
}
