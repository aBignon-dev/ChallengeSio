<?php

namespace App\Controller;
use App\Entity\Pays;
use App\Entity\Marque;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Form\MarqueType;
use App\Form\PaysType;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class GestionVhehiculeController extends AbstractController
{
    /**
     * @Route("/gestion/vhehicule", name="gestion_vhehicule")
     */
    public function index(): Response
    {
        return $this->render('gestion_vhehicule/index.html.twig', [
            'controller_name' => 'GestionVhehiculeController',
        ]);
    }

    /**
     * @Route("/vehicule/nouveau", name="vehiculenouveau")
     * @Route("/vehicule/{id}/edit", name="vehiculemaj")
     */
    public function Gestionvehicule(Vehicule $vehicule = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$vehicule)
        {$vehicule = new Vehicule();}
        
 
        $form = $this->createForm(VehiculeType::class,$vehicule);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($vehicule);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('GestionVehicules/formvehicule.html.twig', [
            'form' => $form->createView(),
            'editmode' => $vehicule->getId() !== null
        ]);
    }

    /**
     * @Route("/marque/nouveau", name="marquenouveau")
     * @Route("/marque/{id}/edit", name="marquemaj")
     */
    public function Gestionmarque(Marque $marque = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$marque)
        {$marque = new Marque();}
        
 
        $form = $this->createForm(MarqueType::class,$marque);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($marque);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('GestionVehicules/formmarque.html.twig', [
            'form' => $form->createView(),
            'editmode' => $marque->getId() !== null
        ]);
    }

    /**
     * @Route("/pays/nouveau", name="paysnouveau")
     * @Route("/pays/{id}/edit", name="paysmaj")
     */
    public function Gestionpays(Pays $pays = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$pays)
        {$pays = new Pays();}
        
 
        $form = $this->createForm(PaysType::class,$pays);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($pays);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('GestionVehicules/formpays.html.twig', [
            'form' => $form->createView(),
            'editmode' => $pays->getId() !== null
        ]);
    }

    /**
     * @Route("/vehicule/voirvehicule/{id}", name="vehiculevoirid")
     */
    public function VoirVehicule(Vehicule $vehicule, 
    EntityManagerInterface $manager)
    {
        return $this->render('GestionVehicules/voirvehicule.html.twig',['levehicule' => $vehicule]);
    }

    /**
     * @Route("/vehicule/voirvehicules", name="vehiculesvoirid")
     */
    public function VoirVehicules( 
        VehiculeRepository $vehiculeRepository)
        {
            $vehicules = $vehiculeRepository->findAll();
            return $this->render('GestionVehicules/voirvehicules.html.twig'
            ,['lesvehicules' => $vehicules]);
        }
    
       /**
     * @Route("/vehicule/voirpays/{id}", name="paysvoirid")
     */
    public function Voirpays( Pays $pays,
    EntityManagerInterface $manager)
        {
             return $this->render('GestionVehicules/voirpays.html.twig'
            ,['lepays' => $pays]);
        } 
    
}
