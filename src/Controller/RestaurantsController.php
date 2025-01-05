<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantsController extends AbstractController
{
    /**
     * @Route("/restaurants", name="restaurants")
     */
    public function index(): Response
    {
        // Exemple de récupération de restaurants depuis la base de données
        // $restaurants = $this->getDoctrine()->getRepository(Restaurant::class)->findAll();

        // Ou si vous avez des données statiques pour tester
        $restaurants = [
            [
                'name' => 'Restaurant 1',
                'type' => 'halal',
                'description' => 'Un restaurant halal avec des plats délicieux.',
                'image_url' => 'https://example.com/restaurant1.jpg',
            ],
            [
                'name' => 'Restaurant 2',
                'type' => 'fastfood',
                'description' => 'Un fast-food offrant des burgers.',
                'image_url' => 'https://example.com/restaurant2.jpg',
            ],
            // Ajoutez d'autres restaurants ici...
        ];

        // Vous pouvez également filtrer par type (halal, fastfood, asiatique, etc.)
        $typeFilter = $this->get('request_stack')->getCurrentRequest()->get('type');
        if ($typeFilter) {
            $restaurants = array_filter($restaurants, function ($restaurant) use ($typeFilter) {
                return $restaurant['type'] === $typeFilter;
            });
        }

        return $this->render('restaurants/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }
}
