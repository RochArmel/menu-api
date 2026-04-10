# **🍽️ Menu-API (Laravel)**

Ce projet est une simple API RESTful faite développée avec **Laravel 12**. Elle permet de gérer le catalogue d'un restaurant (Catégories et Plats).

## **🚀 Compétences mises en avant**

* **Architecture MVC** : Séparation claire de la logique.  
* **Modélisation de données** : Relations parent-enfant (1,n - 1,1) entre Catégories et Plats.  
* **Eloquent ORM** : Utilisation des relations.

## **🛠️ Installation locale**

1. Cloner le dépôt : git clone \<votre-lien-repo\>  
2. Installer les dépendances : composer install  
3. Créer le fichier d'environnement : cp .env.example .env  
4. Générer la clé d'application : php artisan key:generate  
5. Configurer la base de données (SQLite par défaut) : touch database/database.sqlite  
6. Lancer les migrations : php artisan migrate  
7. Lancer le serveur : php artisan serve

## **📡 Documentation de l'API**

L'API est accessible via le préfixe /api.

| Méthode | Point d'entrée | Description |
| :---- | :---- | :---- |
| GET | /categories | Liste toutes les catégories |
| POST | /categories | Créer une nouvelle catégorie |
| GET | /plats | Liste tous les plats avec leurs catégories |
| POST | /plats | Créer un plat (nécessite categorie\_id) |
| DELETE | /plats/{id} | Supprimer un plat |

*Projet réalisé dans le cadre de mon portfolio de stage.*