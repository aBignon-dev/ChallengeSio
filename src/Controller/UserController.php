<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/gestiondesusers", name="gestiondesusers")
     */
    public function gestiondesetudiants(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();
        return $this->render('user/liste_users.html.twig',['users'=>$users]);
    }
}
