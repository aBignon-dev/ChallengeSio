<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionVhehiculeController extends AbstractController
{
    /**
     * @Route("/gestion/vhehicule", name="gestion_vhehicule")
     */
    public function index(): Response
    {
        return $this->render('gestion_vhehicule/index.html.twig', [
            'controller_name' => 'GestionVhehiculeController',
        ]);
    }
}
