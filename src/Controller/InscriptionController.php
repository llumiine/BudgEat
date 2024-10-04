<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscriptionClient", name="app_inscription")
     */
    public function index(): Response
    {
        return $this->render('inscriptionClient.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
}
