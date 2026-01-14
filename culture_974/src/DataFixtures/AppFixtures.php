<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // --- 1. CRÉATION DES CATÉGORIES (US2.1) ---
        
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

        // --- 2. CRÉATION DES ÉVÉNEMENTS (POUR TESTER TES FILTRES) ---

        // Événement 1 : Un Concert
        $event1 = new Event();
        $event1->setTitre('Sakifo Musik Festival');
        $event1->setDescription('Le plus grand festival de la Réunion à Saint-Pierre.');
        $event1->setDate(new \DateTimeImmutable('+1 month'));
        $event1->setLieu('Ravine Blanche, Saint-Pierre');
        $event1->setCategory($categories['Concert']);
        $manager->persist($event1);

        // Événement 2 : Un autre Concert (pour tester le compteur)
        $event2 = new Event();
        $event2->setTitre('Concert Maloya Trad');
        $event2->setDescription('Soirée kabar avec les anciens.');
        $event2->setDate(new \DateTimeImmutable('+2 weeks'));
        $event2->setLieu('Saint-Denis');
        $event2->setCategory($categories['Concert']);
        $manager->persist($event2);

        // Événement 3 : Une Expo
        $event3 = new Event();
        $event3->setTitre('Art contemporain 974');
        $event3->setDescription('Exposition des nouveaux talents péi.');
        $event3->setDate(new \DateTimeImmutable('+5 days'));
        $event3->setLieu('Cité des Arts');
        $event3->setCategory($categories['Expo']);
        $manager->persist($event3);

        // Événement 4 : Un Atelier
        $event4 = new Event();
        $event4->setTitre('Initiation Tressage Vacoa');
        $event4->setDescription('Apprenez à tresser votre propre bertel.');
        $event4->setDate(new \DateTimeImmutable('+10 days'));
        $event4->setLieu('Saint-Philippe');
        $event4->setCategory($categories['Atelier']);
        $manager->persist($event4);

        $manager->flush();
    }
}