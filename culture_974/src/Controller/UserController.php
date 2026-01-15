<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/login')]
final class UserController extends AbstractController
{
    // public function __construct(
    //     private EntityManagerInterface $entityManager,
    //     private UserPasswordHasherInterface $passwordHasher
    // ) {
    //     // Créer l'admin directement dans le constructeur
    //     $admin = new User();
    //     $admin->setEmail('admin@culture974.fr');
        
    //     $hashedPassword = $this->passwordHasher->hashPassword($admin, 'admin123');
    //     $admin->setPassword($hashedPassword);
        
    //     $this->entityManager->persist($admin);
    //     $this->entityManager->flush();

    //     return new Response('Admin user created successfully.');
    // }

    // #[Route('/', name: 'app_user')]
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }

    #[Route('/', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupérer l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
