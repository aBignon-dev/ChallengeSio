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
     * @Route("/flag/test", name="flag")
     */
    public function test(): Response
    {
        return $this->render('flag/index.html.twig');
    }

    public function redirection(): RedirectResponse
    {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');

        // redirectToRoute is a shortcut for:
        // return new RedirectResponse($this->generateUrl('homepage'));

        // redirects to a route and maintains the original query string parameters
        //return $this->redirectToRoute('blog_show', $request->query->all());

    }

    /**
     * @Route("/flagFormulaire", name="flag")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        // creates a task object and initializes some data for this example

        $form = $this->createFormBuilder()
            ->add('textQuote', TextType::class, ['label' => 'Question du flag:'])
            ->add('textReponse', TextType::class, ['label' => 'Réponse au flag:'])
            ->add('valider', SubmitType::class, ['label' => 'Valider'])
            ->getForm();


            $form->handleRequest($request);
            /** Récupère toutes les données du formulaire de la variable resquest instanciée plus haut */
    
            if ($form->isSubmitted() && $form-> isValid()){
                /** Vérification si le formulaire à été cliqué sur soumis, si c'est le cas on vérifie si c'est valide (exemple contenir plusieurs caractères) */
                $data = $form->getData();
                
                $pin = new Flag;

           //     $pin->setReponse($data['textRep']);
                $em->persist($pin);
                $em->flush();
    
            //    return $this->redirectToRoute('home_route'); /** redirection route j'arrive pas à le faire fonctionner */
            }
        return $this->render('flag/index.html.twig', [
            'monFormulaire' => $form->createView()
        ]);
    }
    
  


    public function flag(ValidatorInterface $validator)
    {
        $author = new Flag();

        // ... do something to the $author object

        $errors = $validator->validate($author);

        if (count($errors) > 0) {
            /*
            * Uses a __toString method on the $errors variable which is a
            * ConstraintViolationList object. This gives us a nice string
            * for debugging.
            */
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        return new Response('The author is valid! Yes!');
    }
    
    public function findAllFlag(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Flag::class);//test avec flag 
        $repo->findAllFlag($id);
        
        return $this->render('flag/index.html.twig');
    }
}
