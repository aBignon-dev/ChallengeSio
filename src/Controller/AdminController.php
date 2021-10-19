<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Equipe;
use App\Entity\Flag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository(Equipe::class)->findAll();
        $flags = $em->getRepository(Flag::class)->findAll();

        return $this->render('admin/index.html.twig',
        array('equipe' => $equipes ,
        'flag' => $flags ,[
            'controller_name' => 'AdminController',
        ]));
    }
   
}
