<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientFormInscription;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{
    /**
     * @Route("/clients/inscription", name="app_customer_form_inscription")
     */

    public function inscription(Request $request, EntityManagerInterface $em): Response
    {
        // Crée une nouvelle instance de ton entité Clients
        $clients = new Clients();

        // Crée le formulaire basé sur ta classe ClientFormInscription
        $form = $this->createForm(ClientFormInscription::class, $clients);

        // Gère la requête et la soumission du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide, sauvegarde les données
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($clients);
            $em->flush();

            // Redirige vers une autre page ou affiche un message
            return $this->redirectToRoute('inscription_success');
        }

        // Affiche le formulaire dans le template
        return $this->render('clients/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inscriptionSuccess", name="inscription_success")
     */
    public function success(): Response
    {
        return $this->render('clients/success.html.twig', [
            'message' => 'Nouveau compte ajouté avec succès !',
        ]);
    }
}
