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
        $reponses = $entityManager->getRepository(Reponse::class)->findBy(['lequipe_id'=>$_SESSION['id_equipe']]);
        $titles = [];
        $temps = [];

        foreach ($flags as $flag) {
            array_push($titles,$flag->getTitreQuestion());
        }
        foreach($reponses as $reponse){
            array_push($temps,$reponse->getHeureFin() - $reponse->getHeureDebut());
        }

        return $this->render('recap_flags/index.html.twig', [
            'controller_name' => 'RecapFlagsController',
            'titles' => $titles,
            'temps' => $temps,
        ]);
    }
}
