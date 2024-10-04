<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionClientController extends AbstractController
{
    /**
     * @Route("/inscriptionClient", name="app_inscription")
     */
    public function index(): Response
    {
        return $this->render('inscription/inscriptionClient.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    /**
     * @Route("/inscriptionClient", name="app_customer_form")
     */

    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de l'entité Customer
        $customer = new Customer();

        // Créer le formulaire et le lier à l'entité
        $form = $this->createForm(CustomerType::class, $customer);

        // Traiter la requête HTTP
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarder l'utilisateur dans la base de données
            $entityManager->persist($customer);
            $entityManager->flush();

            // Rediriger vers une autre page ou afficher un message de succès
            return $this->redirectToRoute('customer_success');
        }

        // Rendre le formulaire pour qu'il soit affiché à l'utilisateur
        return $this->render('customer/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
