<?php

namespace App\Controller;

use App\Entity\Flag;
use App\Entity\Reponse;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecapFlagsController extends AbstractController
{
    /**
     * @Route("/RecapFlags", name="RecapFlags")
     */
    public function index(): Response
    {
        return $this->render('Recap_flags/index.html.twig', [
            'controller_name' => 'RecapFlagsController',
        ]);
    }
    /**
     * @Route("/RecapFlags/{id}", name="recap_flags")
     */
    public function GetRecapReponse(Reponse $id, ReponseRepository $vehiculeRepository)
    {
        $vehicules = $vehiculeRepository->findEquipeReponses($id);
     
        return $this->render('Recap_flags/listereponses.html.twig',['lesvehicules' => $vehicules]);
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
