<?php

namespace App\Controller;

use App\Entity\Cart;
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

    #[Route('/add/{id}', name: 'addToCart')]
    public function addToCart(ManagerRegistry $doctrine, $id): Response
    {  
        $em = $doctrine->getManager();
        $service = $doctrine->getRepository(Service::class)->find($id);
        $userId = $this->getUser();
         $cart = new Cart();
         $cart->setFkUser($userId);
        $cart->setFkService($service);
        $em->persist($cart);
         $em->flush();
$items = $doctrine->getRepository(Cart::class)->findAll();

        return $this->render('static/cart.html.twig', [
            'items' => $items,
            

        ]);
    }
    //  #[Route('/delete/{id}', name: 'delete')]
    // public function delete (ManagerRegistry $doctrine, $id): Response
    // {  
    //     $em = $doctrine->getManager();
    //     $item = $doctrine->getRepository(Cart::class)->find($id);
    //     $em->remove($item);
    //     $em->flush();
    //     return $this->redirectToRoute("addToCart");
            

      
    // }
}
