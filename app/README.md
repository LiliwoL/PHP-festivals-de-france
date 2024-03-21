# Application Festivals de France

<!-- TOC -->
* [Application Festivals de France](#application-festivals-de-france)
  * [Description](#description)
  * [Données](#données)
  * [Format CSV](#format-csv)
  * [Format SQL](#format-sql)
<!-- TOC -->
v 0.1

---

# Objectifs

- Créer une base de données à partir de données fournies
- Utiliser PHPMyAdmin pour importer des données
- Utiliser des données en CSV
- Utiliser des données en SQL
- Créer une application de gestion de données

---

# Description

Application de gestion des festivals de France.

---

# Données

Les données sont issues de l'Open Data de la base de données des festivals de France.

Deux formats vous sont proposés.

Entrainez-vous à manipuler les deux.

## Format CSV

Le format CSV (Comma Separated Values) est un format de fichier informatique ouvert, représentant des données tabulaires sous forme de valeurs séparées par des virgules.

On vous fournit un fichier `festivals.csv` pour vous aider à démarrer.

Insérer le dans votre base de données à l'aide de PHPMyAdmin.

Assurez-vous de respecter:
- le nom de la table
- la première ligne contient les noms des colonnes

---

## Format SQL

Un script SQL contenant à la fois la structure de la base, mais également les données.

---

# Code PHP

Dans une application web, comme dans n'importe quel projet de développement, il est important d'organiser son code.

Il est important de différencier :
- les scripts **métiers**, c'est à dire qui serve à la gestion des données de l'application
- des scripts **techniques**, c'est à dire qui sont utiles au fonctionnement de l'application.

Dans une application PHP, il est courant de trouver :
- un fichier `index.php` qui sert de point d'entrée à l'application
- un dossier `includes` ou `inc` qui contient les fichiers de **configuration** et les fonctions **utiles** à l'application
- un dossier `assets` qui contient les fichiers **statiques** (images, css, js)

---

## Accès aux données

Dans le dossier `includes`, vous trouverez un fichier `db.php` qui contient les informations de connexion à la base de données.

Ce fichier met à disposition une variable **globale** qui contiendra la connexion à la base de données.

Cette variable globale sera utilisée tout au long de l'application pour accéder aux données.

```php
<?php
    // Variable globale pour la connexion
    global $conn;

    // Connexion à la base
    $conn = connexion();

    // ========================================
    // Connexion à la base
    // ========================================
    function connexion() : PDO
    {
        try {
            return new PDO('mysql:host=festivals-db;dbname=festivals;charset=utf8', 'sio', 'Azertysio-01');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
```

Le script d'**entrée** de l'application `index.php` utilise ce fichier pour se connecter à la base de données.

```php
// Include the file that contains the connexion function
require('inc/connexion.php');
```