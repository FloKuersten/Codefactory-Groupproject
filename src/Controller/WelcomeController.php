<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(): Response
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('static/about.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('static/contact.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    // #[Route('/login', name: 'app_login')]
    // public function login(): Response
    // {
    //     return $this->render('static/login.html.twig', [
    //         'controller_name' => 'WelcomeController',
    //     ]);
    // }

    #[Route('/cart', name: 'app_cart')]
    public function cart(): Response
    {
        return $this->render('static/cart.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }
}
