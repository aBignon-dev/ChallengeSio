<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/client/nouveau", name="clientnouveau")
     * @Route("/client/{id}/edit", name="clientmaj")
     */
    public function GestionClient(Client $client = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$client)
        {$client = new Client();}
        
 
        $form = $this->createForm(ClientType::class,$client);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($client);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('client/GestionClient.html.twig', [
            'form' => $form->createView(),
            'editmode' => $client->getId() !== null
        ]);
    }
    /**
     * @Route("/client/VoirClient/{id}", name="clientvoirid")
     */
    public function VoirClient(Client $leclient, 
    EntityManagerInterface $manager)
    {
        return $this->render('client/voirclient.html.twig',['leclient' => $leclient]);
    }

    /**
     * @Route("/client/VoirClients", name="clientsvoir")
     */
    public function VoirClients( 
    ClientRepository $clientRepository)
    {
        $lesclients = $clientRepository->findAll();
        return $this->render('client/voirclients.html.twig',['lesclients' => $lesclients]);
    }

    /**
     * @Route("/client/hello", name="hello")
     */
    public function hello() 
    {
        return $this->render('client/hello.html.twig',['toto' => 'eeeee']);
    }
}
