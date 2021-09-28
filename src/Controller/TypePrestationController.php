<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypePrestation;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\TypePrestationType;

class TypePrestationController extends AbstractController
{
    /**
     * @Route("/type/prestation", name="type_prestation")
     */
    public function index(): Response
    {
        return $this->render('type_prestation/index.html.twig', [
            'controller_name' => 'TypePrestationController',
        ]);
    }

    ///////////////////////////////////////
/**
     * @Route("/typeprestation/nouveau", name="typeprestationnouveau")
     * @Route("/typeprestation/{id}/edit", name="typeprestationmaj")
     */
    public function Gestiontypeprestation(TypePrestation $typePrestation = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$typePrestation)
        {$typePrestation = new TypePrestation();}
        
 
        $form = $this->createForm(TypePrestationType::class,$typePrestation);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($typePrestation);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('typeprestation/GestionTypePrestation.html.twig', [
            'form' => $form->createView(),
            'editmode' => $typePrestation->getId() !== null
        ]);
    }


    //////////////////////////////////////
}
