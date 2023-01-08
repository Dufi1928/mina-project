<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotifsController extends AbstractController
{
    #[Route('/motifs', name: 'app_motifs')]
    public function index(): Response
    {
        return $this->render('motifs/index.html.twig', [
            'controller_name' => 'MotifsController',
        ]);
    }
}
