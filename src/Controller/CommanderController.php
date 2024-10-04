<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommanderController extends AbstractController
{
    /**
     * @Route("/commander", name="app_commander")
     */
    public function index(): Response
    {
        return $this->render('commander/index.html.twig', [
            'controller_name' => 'CommanderController',
        ]);
    }
}
