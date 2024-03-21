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