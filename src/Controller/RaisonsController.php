<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RaisonsController extends AbstractController
{
    #[Route('/raisons', name: 'app_raisons')]
    public function index(): Response
    {
        return $this->render('raisons/raisons.html.twig', [
            'controller_name' => 'RaisonsController',
        ]);
    }
}
