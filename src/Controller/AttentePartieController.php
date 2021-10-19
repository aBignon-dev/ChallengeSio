<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttentePartieController extends AbstractController
{
    /**
     * @Route("/attente/partie", name="attente_partie")
     */
    public function index(): Response
    {
        return $this->render('attente_partie/index.html.twig', [
            'controller_name' => 'AttentePartieController',
        ]);
    }
}
