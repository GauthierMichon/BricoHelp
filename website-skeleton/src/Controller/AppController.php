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

        $max = 0;

        $pages = $repo->findBy(array('name'=> $name));

        foreach($pages as $page_max) {
            if ($page_max->getPage() > $max) {
                $max = $page_max->getPage();
            }
        }


        return $this->render('app/manuel.html.twig', [
            'manuel' => $manuel,
            'page' => $page,
            'max' => $max
        ]);
    }
}
