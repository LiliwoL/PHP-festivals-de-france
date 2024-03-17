<?php

    /**
     * Get the festival with the given id
     *
     * @param int $id
     * @return array
     */
    function selectAllFestivals() : array
    {
        global $conn;
        $req = $conn->prepare('SELECT * FROM festivals');
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Get the festival with the given id
     *
     * @param int $id
     * @return array
     */
    function selectFestival(int $id) : array
    {
        global $conn;
        $req = $conn->prepare('SELECT * FROM festivals WHERE id_festival = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch();
    }