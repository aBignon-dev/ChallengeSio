<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function redirection(): RedirectResponse
    {
    // redirects to the "homepage" route
    return $this->redirectToRoute('homepage');

    // redirectToRoute is a shortcut for:
    // return new RedirectResponse($this->generateUrl('homepage'));

    // redirects to a route and maintains the original query string parameters
    //return $this->redirectToRoute('blog_show', $request->query->all());

    }

    


}
