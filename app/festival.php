<?php
    // Include the file that contains the connexion function
    require('inc/init.php');
    require('inc/festivals.php');

    // Récupérer l'id du festival passé en paramètre
    $id = $_GET['id'];

    // Test de l'existence de l'id
    if (empty($id)) {
        die('Erreur : aucun identifiant de festival');
    }

    // Test de la validité de l'id
    if (!is_numeric($id)) {
        die('Erreur : identifiant de festival invalide');
    }

    // Test de l'existence du festival
    $festival = selectFestival($id);
    if (empty($festival)) {
        die('Erreur : festival inexistant');
    }
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
