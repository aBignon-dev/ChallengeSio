<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FlagController extends AbstractController
{
    /**
     * @Route("/flag", name="flag")
     */
    public function index(): Response
    {
        return $this->render('flag/index.html.twig', [
            'controller_name' => 'FlagController',
        ]);
    }

    


}
