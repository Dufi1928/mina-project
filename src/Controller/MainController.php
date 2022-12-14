<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('dufi1928.github.io/mina-project/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/creation.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
