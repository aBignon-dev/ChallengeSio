<?php

namespace App\Controller;

use App\Entity\Equipe;
use Doctrine\ORM\Mapping\Id;
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
        $em = $this->getDoctrine()->getManager();
        //$MembresEquipe = $em->getRepository(Equipe::class)->find();
        return $this->render('attente_partie/index.html.twig',
       //array( 'equipe' => $MembresEquipe ,
       [
            'controller_name' => 'AttentePartieController',
        ])
   // )
    ;
    }
}