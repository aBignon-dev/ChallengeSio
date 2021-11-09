<?php

namespace App\Controller;
use App\Entity\Equipe;
use App\Form\EquipeType;
use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class EquipeController extends AbstractController
{
    /**
     * @Route("/equipe", name="equipe")
     */
    public function index(): Response
    {
        return $this->render('equipe/index.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }
    /**
     * @Route("/equipe/nouveau", name="equipenouveau")
     * @Route("/equipe/{id}/edit", name="equipemaj")
     */
    public function GestionEquipe(Equipe $equipe = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$equipe)
        {$equipe = new Equipe();}
        
 
        $form = $this->createForm(EquipeType::class,$equipe);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($equipe);
            
            $manager->flush();
 
            return $this->redirectToRoute('listedesequipes');
        }
 
        return $this->render('equipe/gestion_equipe.html.twig', [
            'form' => $form->createView(),
            'editmode' => $equipe->getId() !== null
        ]);
    }

     /**
     * @Route("/equipe/listedesequipes", name="listedesequipes")
     */
    public function gestiondesequipes(EquipeRepository $equipeRepository)
    {
        $equipes = $equipeRepository->findAll();
        return $this->render('equipe/liste_equipe.html.twig',['equipes'=>$equipes]);
    }
}
