<?php

namespace App\Controller;
use App\Entity\Departement;
use App\Form\DepartementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class DepartementController extends AbstractController
{
    /**
     * @Route("/departement", name="departement")
     */
    public function index(): Response
    {
        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
        ]);
    }
    /**
     * @Route("/departement/nouveau", name="departementnouveau")
     * @Route("/departement/{id}/edit", name="departementmaj")
     */
    public function GestionDepartement(Departement $departement = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$departement)
        {$departement = new Departement();}
        
 
        $form = $this->createForm(DepartementType::class,$departement);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($departement);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('departement/Gestiondepartement.html.twig', [
            'form' => $form->createView(),
            'editmode' => $departement->getId() !== null
        ]);
    }
}
