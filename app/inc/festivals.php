<?php

    function selectAllFestivals() : array
    {
        global $conn;
        $req = $conn->prepare('SELECT * FROM festivals');
        $req->execute();
        return $req->fetchAll();
    }