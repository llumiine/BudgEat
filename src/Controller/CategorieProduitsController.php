<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieProduitsController extends AbstractController
{
    /**
     * @Route("/categorie/produits", name="app_categorie_produits")
     */
    public function index(): Response
    {
        return $this->render('categorie_produits/index.html.twig', [
            'controller_name' => 'CategorieProduitsController',
        ]);
    }
}
