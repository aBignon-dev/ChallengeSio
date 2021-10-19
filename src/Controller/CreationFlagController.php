<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationFlagController extends AbstractController
{
    /**
     * @Route("/creation/flag", name="creation_flag")
     */
    public function index(): Response
    {
        return $this->render('creation_flag/index.html.twig', [
            'controller_name' => 'CreationFlagController',
        ]);
    }
}
