<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Flag;
use App\Entity\Reponse;
use App\Form\IndiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageIndiceController extends AbstractController
{
    /**
     * @Route("/page/indice", name="page_indice")
     */
    public function index(): Response
    {
        $reponse = new Reponse();
        $entityManager = $this->getDoctrine()->getManager();
        $equipes = $entityManager->getRepository(Equipe::class)->findAll();

        $flags = $entityManager->getRepository(Flag::class)->findAll();

        $form = $this->createForm(IndiceType::class, ['equipes' => $equipes, 'flags' => $flags]);

        return $this->render('page_indice/index.html.twig', [
            'controller_name' => 'PageIndiceController',
            'form' => $form->createView(),
        ]);
    }
}
