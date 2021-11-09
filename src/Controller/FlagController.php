<?php

namespace App\Controller;

use App\Entity\Flag;
use App\Repository\FlagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Form\FlagType;

class FlagController extends AbstractController
{
    /**
     * @Route("/flag", name="flag")
     */
    public function index(): Response
    {
        return $this->render('flag/index.html.twig', [
            'controller_name' => 'FlagController',
        ]);
    }


/**
     * @Route("/flag/nouveau", name="flagnouveau")
     * @Route("/flag/{id}/edit", name="flagmaj")
     */
    public function GestionClient(Flag $flag = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$flag)
        {$flag = new Flag();}
        
 
        $form = $this->createForm(FlagType::class,$flag);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($flag);
            
            $manager->flush();
 
            return $this->redirectToRoute('listedesflags');
        }
 
        return $this->render('flag/gestion_flag.html.twig', [
            'form' => $form->createView(),
            'editmode' => $flag->getId() !== null
        ]);
    }
      /**
     * @Route("/equipe/listedesflags", name="listedesflags")
     */
    public function gestiondesequipes(FlagRepository $flagRepository)
    {
        $flags = $flagRepository->findAll();
        return $this->render('flag/liste_flag.html.twig',['flags'=>$flags]);
    }
}
