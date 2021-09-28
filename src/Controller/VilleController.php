<?php

namespace App\Controller;
use App\Entity\Ville;
use App\Form\VilleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index(): Response
    {
        return $this->render('ville/index.html.twig', [
            'controller_name' => 'VilleController',
        ]);
    }
    /**
     * @Route("/ville/nouveau", name="villenouveau")
     * @Route("/ville/{id}/edit", name="villemaj")
     */
    public function GestionClient(Ville $ville = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$ville)
        {$ville = new Ville();}
        
 
        $form = $this->createForm(VilleType::class,$ville);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($ville);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('ville/GestionVille.html.twig', [
            'form' => $form->createView(),
            'editmode' => $ville->getId() !== null
        ]);
    }
}
