<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Event;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    // Injection du service pour crypter les mots de passe
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // --- 1. CRÉATION D'UN ADMINISTRATEUR ---
        $admin = new User();
        $admin->setEmail('johndoe@mail.com');
        $admin->setRoles(['ROLE_USER']);
        // On hache le mot de passe "admin123"
        $hashedPassword = $this->passwordHasher->hashPassword($admin, 'admin123');
        $admin->setPassword($hashedPassword);

        $manager->persist($admin);

        // --- 2. CRÉATION DES CATÉGORIES ---
        $categories = [];
        $dataCats = [
            'Concert' => ['color' => '#FF5733', 'icon' => '🎸'],
            'Expo' => ['color' => '#33FF57', 'icon' => '🎨'],
            'Atelier' => ['color' => '#3357FF', 'icon' => '🛠️'],
            'Conférence' => ['color' => '#F3FF33', 'icon' => '🎤'],
        ];

        foreach ($dataCats as $nom => $details) {
            $category = new Category();
            $category->setNom($nom);
            $category->setCouleur($details['color']);
            $category->setIcone($details['icon']);
            $manager->persist($category);

            $categories[$nom] = $category;
        }

        // --- 3. CRÉATION DES ÉVÉNEMENTS ---

        $event1 = new Event();
        $event1->setTitre('Sakifo Musik Festival');
        $event1->setDescription('Le plus grand festival de la Réunion à Saint-Pierre.');
        $event1->setDate(new \DateTimeImmutable('+1 month'));
        $event1->setLieu('Ravine Blanche, Saint-Pierre');
        $event1->setCategory($categories['Concert']);
        $event1->setImage('https://la1ere.franceinfo.fr/image/CqaFowJYLmeGUz3l70OeU1yTcQE/220x33:1403x700/1200x675/filters:format(webp):quality(80)/outremer%2F2024%2F02%2F20%2F2024-02-20-19-29-09-sakifo-musik-festival-edition-2023-65d4c57511e25417426892.jpg');
        $manager->persist($event1);

        // Événement 2 : Un autre Concert
        $event2 = new Event();
        $event2->setTitre('Concert Maloya Trad');
        $event2->setDescription('Soirée kabar avec les anciens.');
        $event2->setDate(new \DateTimeImmutable('+2 weeks'));
        $event2->setLieu('Saint-Denis');
        $event2->setCategory($categories['Concert']);
        $event2->setImage('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUoVNmv9FZeoaXynVmsHSdl4ul389_V3jY8Q&s');
        $manager->persist($event2);

        $event3 = new Event();
        $event3->setTitre('Art contemporain 974');
        $event3->setDescription('Exposition des nouveaux talents péi.');
        $event3->setDate(new \DateTimeImmutable('+5 days'));
        $event3->setLieu('Cité des Arts');
        $event3->setCategory($categories['Expo']);
        $event2->setImage('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf7yn6owalvF0h8u28hFRGIQNC76BshPixTQ&s');
        $manager->persist($event3);

        $event4 = new Event();
        $event4->setTitre('Initiation Tressage Vacoa');
        $event4->setDescription('Apprenez à tresser votre propre bertel.');
        $event4->setDate(new \DateTimeImmutable('+10 days'));
        $event4->setLieu('Saint-Philippe');
        $event4->setCategory($categories['Atelier']);
        $event2->setImage('https://as1.ftcdn.net/jpg/00/19/98/96/1000_F_19989607_w3CPnyOJtxXdZVmm8vpkEhA4tU9DcgaO.jpg');
        $manager->persist($event4);

        $manager->flush();
    }
}