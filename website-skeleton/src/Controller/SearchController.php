<?php

namespace App\Controller;

use App\Entity\Meuble;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function home(Request $request)
    {
            $propertySearch = new PropertySearch();
            $form = $this->createForm(PropertySearchType::class,$propertySearch);
            $form->handleRequest($request);
    
            $articles= [];
    
    
            if($form->isSubmitted() && $form->isValid()) {
            $ref = $propertySearch->getRef(); if ($ref!="")
            $articles= $this->getDoctrine()->getRepository(Meuble::class)->findBy(['ref' => $ref] ); else
            $articles= $this->getDoctrine()->getRepository(Meuble::class)->findAll();
            }
            return	$this->render('app/search.html.twig',[ 'form' =>$form->createView(), 'ref' => $articles]);
            }
            
    }
    
    