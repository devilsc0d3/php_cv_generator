# Générateur de CV en ligne - Projet PHP B2

Ce projet consiste à développer un générateur de CV en ligne en utilisant PHP. Les principales fonctionnalités comprennent la création de comptes, la collecte d'informations via des formulaires, la gestion des données dans une base de données, la génération de CV au format PDF, et la mise en place de procédures de contrôle et validation des données.

## Objectifs
- Créer des CV en ligne depuis le navigateur
- Afficher et modifier des CV déjà créés et stockés en base de données
- Générer des CV au format PDF à partir des informations fournies

## Consignes
- Permettre la création d'un compte utilisateur
- Utiliser des formulaires pour collecter les informations nécessaires
- Définir des classes pour permettre le choix dans une bibliothèque de modèles de CV
- Mettre en place des procédures de contrôle et validation des données
- Monter une base de données pour stocker les informations des CV
- Utiliser des librairies natives au PHP pour générer les PDF

## Champs obligatoires
- Noms et prénoms
- Adresse email
- Numéro de téléphone
- Expérience professionnelle
- Parcours académique
- Hobbies

## Critères d'évaluation du projet
- La grille d'évaluation fournie dans le moodle sera utilisée pour évaluer le projet.

## Installation

### Prérequis
- [XAMPP](https://www.apachefriends.org/index.html) ou [Laragon](https://laragon.org/) installé sur votre machine
- Activation de la bibliothèque GD (Graphics Draw) dans PHP

### Instructions d'installation pour XAMPP
1. Clonez le dépôt depuis GitHub:
2. Placez le dossier cloné dans le répertoire `htdocs` de votre installation XAMPP.
3. Assurez-vous que XAMPP est en cours d'exécution sur votre machine.
4. Ouvrez le fichier de configuration `php.ini` situé dans le répertoire `xampp\php`.
5. Recherchez la ligne contenant `;extension=gd` et enlevez le point-virgule pour activer GD.
6. Enregistrez et fermez le fichier `php.ini`.
7. Redémarrez le serveur Apache depuis le panneau de contrôle XAMPP.
8. Ouvrez un navigateur web et accédez à l'URL correspondant à votre serveur local (par exemple, `http://localhost/php_cv_generator`).
9. Suivez les instructions à l'écran pour terminer la configuration de l'application.

### Instructions d'installation pour Laragon
1. Clonez le dépôt depuis GitHub:
2. Placez le dossier cloné dans le répertoire `www` de votre installation Laragon.
3. Assurez-vous que Laragon est en cours d'exécution sur votre machine.
4. Ouvrez le fichier de configuration `conf.ini` dans le répertoire `laragon\bin\php\php-{version}`.
5. Recherchez la ligne contenant `extension=gd` et assurez-vous qu'elle est décommentée (sans le point-virgule).
6. Enregistrez et fermez le fichier `conf.ini`.
7. Redémarrez le serveur Apache depuis l'interface Laragon.
8. Ouvrez un navigateur web et accédez à l'URL correspondant à votre serveur local (par exemple, `http://localhost/php_cv_generator`).
9. Suivez les instructions à l'écran pour terminer la configuration de l'application.

### Importation de la base de données
Avant d'utiliser l'application, vous devez importer le fichier SQL fourni dans votre gestionnaire de base de données. Voici les étapes générales :
1. Ouvrez votre gestionnaire de base de données (par exemple, phpMyAdmin pour XAMPP).
2. Créez une nouvelle base de données avec un nom de votre choix (par exemple, `cv_generator`).
3. Sélectionnez la nouvelle base de données que vous venez de créer.
4. Importez le fichier SQL fourni (`nom_du_fichier.sql`) dans votre gestionnaire de base de données.
5. Assurez-vous que les tables ont été correctement importées.

Vous devriez maintenant avoir le générateur de CV en ligne fonctionnant sur votre serveur local.

---

