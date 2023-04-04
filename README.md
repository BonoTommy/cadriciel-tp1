# Adresse webdev

https://e2295815.webdev.cmaisonneuve.qc.ca/cadriciel-tp1/

## Lignes de commande pour le projet

- Créer le projet
  > composer create-project --prefer-dist laravel/laravel Maisonneuve-e2295815 "8.*"

- Exécuter l'application
  > php artisan serve

- Mode développement
 > npm install
 > npm run dev

- Créer les modèles
  > php artisan make:model Etudiant
  > php artisan make:model Ville

- Créer les tables
  > php artisan make:migration create_etudiants_table
  > php artisan make:migration create_villes_table
  > php artisan migrate

- Créer les factory
  > php artisan make:factory EtudiantFactory -m Etudiant
  > php artisan make:factory VilleFactory -m Ville

- Utilisation de tinker
  > php artisan tinker
  >> \App\Models\Etudiant::factory()->times(100)->create()
  >> \App\Models\Ville::factory()->times(15)->create()

- Création des controller
  > php artisan make:controller EtudiantController -m Etudiant
  > php artisan make:controller VilleController -m Ville

- Pour formater les numéros de téléphone canadien
  > composer require giggsey/libphonenumber-for-php

- Pour effectuer la validation avec request
  > php artisan make:request EtudiantStoreRequest