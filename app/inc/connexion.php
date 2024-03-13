<?php

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