<?php

namespace App\Controller;

use App\Entity\Flag;
use App\Entity\Reponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecapFlagsController extends AbstractController
{
    /**
     * @Route("/recap/flags", name="recap_flags")
     */
    public function GetRecapReponse($id_equipe, EntityManagerInterface $m){
        $flagsTitres = $m->getRepository(Flag::class);
        $reponses = $m->getRepository(Reponse::class)->findEquipeReponses();
        $reponsesEquipe = [];
        foreach($reponses as $reponse){
            if($reponse->getId == $id_equipe) array_push($reponsesEquipe,$reponse);
        }

    }


    // public function index(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();
    //     $flags = $entityManager->getRepository(Flag::class)->findAll();
    //     $reponseDeLequipe = $entityManager->getRepository(Reponse::class)->findBy(['lequipe_id'=>$_SESSION['id_equipe']]);
    //     $titles = [];
    //     $temps = [];
    //     $nb_equipes = [];
    //     $reponses_flag = [];

    //     foreach ($flags as $flag) {
    //         array_push($titles,$flag->getTitreQuestion());
    //     }
    //     foreach($reponsesDeLequipe as $reponse){
    //         array_push($temps,$reponse->getHeureFin() - $reponse->getHeureDebut());
    //     }
    //     foreach($reponsesDeLequipe as $reponse){
    //         $reponses_flag[$reponse->getLeFlag()->getId()] = $reponse->getReussie();
    //     }

    //     $resultat = json_encode($titles);
    //     var_dump($resultat);
    //     return $this->render('recap_flags/index.html.twig', [
    //         'controller_name' => 'RecapFlagsController',
    //         'titles' => $titles,
    //         'temps' => $temps,
    //         'nb_equipes' => $nb_equipes,

    //     ]);
    // }
}
