<?php

namespace App\Controller;

use App\Entity\Flag;
use App\Entity\Reponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecapFlagsController extends AbstractController
{
    /**
     * @Route("/recap/flags", name="recap_flags")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $flags = $entityManager->getRepository(Flag::class)->findAll();
        $reponses = $entityManager->getRepository(Reponse::class);
        $titles = [];
        foreach ($flags as $flag) {
            array_push($titles,$flag->getTitreQuestion());
        }
        var_dump($titles);
        return $this->render('recap_flags/index.html.twig', [
            'controller_name' => 'RecapFlagsController',
        ]);
    }
}
