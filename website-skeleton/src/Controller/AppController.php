<?php

namespace App\Controller;

use App\Entity\Manuel;
use App\Entity\Meuble;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }


    /**
     * @Route("/fiche/{name}", name="app")
     */
    public function fiche(Request $request, $name): Response
    {
        $repo = $this->getDoctrine()->getRepository(Meuble::class);
        $meuble = $repo->findBy(array('name'=> $name));

        return $this->render('app/fiche.html.twig', [
            'meuble' => $meuble,
        ]);
    }

    /**
     * @Route("/manuel/{name}/{page}", name="manuel")
     */
    public function manuel(Request $request, $name, $page): Response
    {
        $repo = $this->getDoctrine()->getRepository(Manuel::class);
        $manuel = $repo->findBy(array('name'=> $name, "page" => $page));

        return $this->render('app/manuel.html.twig', [
            'manuel' => $manuel,
        ]);
    }
}
