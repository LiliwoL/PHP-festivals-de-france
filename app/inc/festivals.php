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


    /**
     * Get the festivals for a given city
     *
     * @param string $city
     * @return array
     */
    function selectFestivalsByCity(string $city) : array
    {
        global $conn;
        $req = $conn->prepare('SELECT * FROM festivals WHERE commune_principale_de_deroulement = :city');
        $req->bindParam(':city', $city, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    function displayFestivals( array $festivals ) : void
    {
        // Test de l'existence de festivals
        if (empty($festivals)) :
            ?>
            <p>Aucun festival pour le moment</p>
        <?php else : ?>
            <!-- Display the list of festivals -->
            <table border="1">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Site Internet</th>
                    <th>Région</th>
                    <th>Ville</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($festivals as $festival) : ?>
                    <tr>
                        <td>
                            <a href="festival.php?id=<?= $festival['id_festival'] ?>">
                                <?= $festival['nom_du_festival'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= $festival['site_internet_du_festival'] ?>">
                                <?= $festival['site_internet_du_festival'] ?>
                            </a>
                        </td>
                        <td>
                            <?= $festival['region_principale_de_deroulement'] ?>
                        </td>
                        <td>
                            <a href="festival.php?city=<?= $festival['commune_principale_de_deroulement'] ?>">
                                <?= $festival['commune_principale_de_deroulement'] ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif;

    }

    function displayFestival(int $id) : void
    {
        // Récupération du festival
        $festival = selectFestival($id);

        // Test de l'existence du festival
        if (empty($festival)) :
            die('Erreur : festival inexistant');
        else:
            ?>
            <!-- Display the festival -->
            <h1>Festival <?= $festival['nom_du_festival']; ?></h1>
            <p>
                Type: <?= $festival['discipline_dominante']; ?>
            </p>
            <p>
                <a href="<?= $festival['site_internet_du_festival']; ?>" target="_blank">
                    <?= $festival['site_internet_du_festival']; ?>
                </a>
            </p>
            <p>
                Département: <?= $festival['departement_principal_de_deroulement']; ?>
            </p>
        <?php
        endif;
    }