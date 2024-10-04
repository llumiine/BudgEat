<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieRestaurantsController extends AbstractController
{
    /**
     * @Route("/categorie/restaurants", name="app_categorie_restaurants")
     */
    public function index(): Response
    {
        return $this->render('categorie_restaurants/index.html.twig', [
            'controller_name' => 'CategorieRestaurantsController',
        ]);
    }
}
