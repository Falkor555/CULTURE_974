# Culture 974

Application web pour l'association "Culture 974" permettant de gérer et promouvoir les événements culturels à La Réunion.

## Contexte du projet

L'association "Culture 974" souhaitait un site web moderne pour afficher ses événements culturels (concerts, expositions, ateliers, conférences) et permettre aux visiteurs de s'inscrire facilement.

## Fonctionnalités

### Pour les visiteurs
- **Consultation des événements** : Visualisation de la liste complète des événements à venir, classés par ordre chronologique
- **Filtrage par catégorie** : Filtres dynamiques par type (Concert, Expo, Atelier, Conférence)
- **Menu déroulant des catégories** : Navigation simplifiée vers les catégories depuis la navbar
- **Inscription aux événements** : 
  - Formulaire d'inscription simple et intuitif
  - Validation du nombre de places (minimum 1 place, pas de nombre négatif)
- **Interface moderne** : Design responsive avec CSS personnalisé

### Pour les administrateurs
- **Gestion des événements** :  
  - CRUD complet (Create, Read, Update, Delete)
  - Création d'événements uniquement sur les heures 00 et 30
  - Formulaires améliorés avec design moderne
  - Actions visibles uniquement pour l'utilisateur connecté
- **Gestion des catégories** : 
  - Organisation des événements par catégories
  - Interface CRUD complète pour les catégories
  - Bouton de modification sous forme d'emoji
  - Formulaires de création et modification avec design amélioré
- **Dashboard administrateur** : 
  - Vue d'ensemble des statistiques par événement
  - Suivi des inscriptions en temps réel
- **Gestion des inscriptions** : 
  - Visualisation et suivi des inscriptions
  - Statistiques détaillées
- **Système d'authentification** : 
  - Connexion sécurisée pour les administrateurs
  - Protection des routes administratives
  - Contrôle d'accès basé sur les rôles

## Technologies utilisées

- **Framework** :  Symfony 7.4.*
- **Base de données** : MySQL
- **Langage** : PHP 8.x
- **Frontend** : HTML5, CSS3, Twig
- **Sécurité** : Système d'authentification Symfony

## Fonctionnalités techniques

- Architecture MVC avec Symfony
- Entités Doctrine (Event, Category, Registration, User)
- Formulaires Symfony avec validation
- Relations entre entités (OneToMany, ManyToOne)
- Système de rôles et permissions
- Routes protégées par sécurité
- Templates Twig modulaires et réutilisables

## Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/Falkor555/CULTURE_974.git
cd CULTURE_974
```

2. Installer les dépendances :
```bash
composer install
```

3. Configurer la base de données dans `.env` :
```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/culture_974"
```

4. Créer la base de données et exécuter les migrations :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. Charger les fixtures (optionnel) :
```bash
php bin/console doctrine:fixtures:load
```

6. Lancer le serveur de développement :
```bash
symfony server:start
```

## Utilisation

- Accès visiteur : `http://localhost:8000`
- Accès administrateur : `http://localhost:8000/admin`

## Mises à jour récentes

### Version 1.3.0 (Janvier 2026)
- ✨ Ajout du dashboard administrateur avec statistiques par événement
- 🐛 Correction : classement des événements par ordre chronologique
- 🐛 Correction : création d'événements uniquement sur heures 00 et 30
- 🐛 Correction : validation du nombre de places minimum à 1
- 🎨 Amélioration des formulaires de création et modification
- 🔧 Ajout du menu déroulant pour les catégories

### Version 1.2.0 (Janvier 2026)
- 🔐 Implémentation du système d'authentification admin
- 👤 Gestion des utilisateurs et des rôles
- 🔒 Sécurisation des routes administratives
- 📊 Système de permissions par utilisateur

### Version 1.1.0 (Janvier 2026)
- 📝 Gestion complète des catégories (CRUD)
- 📋 Système d'inscriptions aux événements
- 🎨 Amélioration de l'interface utilisateur

## Contributeurs

- [@Falkor555](https://github.com/Falkor555)
- [@chloebaisse1](https://github.com/chloebaisse1)
- [@M8-Avatar](https://github.com/M8-Avatar)

## License

Ce projet est développé pour l'association Culture 974.