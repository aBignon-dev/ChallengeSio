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
        // $reponsesDeLequipe = $entityManager->getRepository(Reponse::class)->findEquipeReponses($equipe);
        $titles = [];
        $temps = [];
        $nb_equipes = [];
        $reponses_flag = [];

        foreach ($flags as $flag) {
            array_push($titles,$flag->getTitreQuestion());
        }
        // foreach($reponsesDeLequipe as $reponse){
        //     array_push($temps,$reponse->getHeureFin() - $reponse->getHeureDebut());
        // }
        // foreach($reponsesDeLequipe as $reponse){
        //     $reponses_flag[$reponse->getLeFlag()->getId()] = $reponse->getReussie();
        // }

        $resultat = json_encode($titles);
        var_dump($resultat);
        return $this->render('recap_flags/index.html.twig', [
            'controller_name' => 'RecapFlagsController',
            'titles' => $titles,
            'temps' => $temps,
            'nb_equipes' => $nb_equipes,

        ]);
    }
}
