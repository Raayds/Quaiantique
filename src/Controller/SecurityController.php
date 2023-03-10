<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'security.login', methods: ['GET', 'POST'])]
    public function index(): Response {

        $NAVBAR = 4;
        return $this->render('security/login.html.twig', [
            'controller_name' => 'SecurityController',
            'NAVBAR' => $NAVBAR
        ]);
    }
    #[Route('/déconnexion', 'security.logout')]
    public function logout() {

    }
}
