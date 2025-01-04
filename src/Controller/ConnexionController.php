<?php

namespace App\Controller;

use App\Entity\Clients;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_login")
     */
    public function login(Request $request, EntityManagerInterface $em): Response
    {
        // Si l'utilisateur est déjà connecté, on le redirige vers le tableau de bord
        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }

        // Récupérer l'email et le mot de passe soumis
        $mail = $request->request->get('mail');
        $mdp = $request->request->get('mdp');

        // Recherche du client par email dans la base de données
        $client = $em->getRepository(Clients::class)->findOneBy(['mail' => $mail]);

        // Si un client est trouvé et que les mots de passe correspondent
        if ($client && $mdp === $client->getMdp()) {
            // L'utilisateur est authentifié, on gère la session
            $session = $request->getSession  ();
            $session->set('user_id', $client->getId()); // Sauvegarder l'ID de l'utilisateur dans la session
            $session->set('user_role', $client->getRole()); // Sauvegarder le rôle de l'utilisateur dans la session

            // Rediriger l'utilisateur vers le tableau de bord en fonction de son rôle
            if ($client->getRole() === 1) {
                return $this->render('home/index.html.twig');
            } elseif ($client->getRole() === 2) {
                return $this->render('home/admin.html.twig');
            }
        } else {
            // Email ou mot de passe incorrect
            $this->addFlash('error', 'Email ou mot de passe incorrect');
        }

        // Rendu du formulaire de connexion
        return $this->render('connexion/index.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(Request $request): Response
    {
        
        // Récupérer les informations de l'utilisateur depuis la session
        $session = $request->getSession();
        $role = $session->get('user_role');

        // Vérification du rôle pour accéder à cette page
        if ($role !== 1) {
            // Redirection si l'utilisateur n'est pas un client
            return $this->redirectToRoute('unauthorized');
        }

        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/admin-dashboard", name="admin_dashboard")
     */
    public function adminDashboard(Request $request): Response
    {
        // Récupérer les informations de l'utilisateur depuis la session
        $session = $request->getSession();
        $role = $session->get('user_role');

        // Vérification du rôle pour accéder à l'admin dashboard
        if ($role !== 2) {
            // Redirection si l'utilisateur n'est pas un administrateur
            return $this->redirectToRoute('unauthorized');
        }

        return $this->render('home/admin.html.twig');
    }

    /**
     * @Route("/unauthorized", name="unauthorized")
     */
    public function unauthorized(): Response
    {
        return $this->render('home/unauthorized.html.twig', [
            'message' => 'Accès non autorisé',
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(Request $request): Response
    {
        // Supprimer les informations de la session
        $session = $request->getSession();
        $session->remove('user_id');
        $session->remove('user_role');

        // Rediriger vers la page de connexion
        return $this->redirectToRoute('app_login');
    }
}
