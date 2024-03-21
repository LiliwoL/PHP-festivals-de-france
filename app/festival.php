<?php
    // Include the file that contains the connexion function
    require('inc/connexion.php');

    // Include the file that contains the function to manage the festivals
    require('inc/festivals.php');


    // Read parameters and check if they are valid
    // ============================================
    // Id du festival
    if (isset($_GET['id']))
    {
        // Get the id from parameter
        $id = $_GET['id'];

        // Check if the id is a number
        if (!is_numeric($id)) {
            die('Erreur : identifiant de festival invalide');
        }

        // Set html title
        $title = 'Festival ' . $id;

        // Set a flag to display a single festival
        $single = true;

        // Test de l'existence du festival
        $festival = selectFestival($id);
        if (empty($festival)) {
            die('Erreur : festival inexistant');
        }
    }
    // By city
    else if (isset($_GET['city']))
    {
        // Get the city from parameter
        $city = $_GET['city'];

        // Set html title
        $title = 'Liste des festivals à ' . $city;

        // Set a flag to display a list of festivals
        $single = false;

        // Find festivals in the city
        $festivals = selectFestivalsByCity($city);
        if (empty($festivals)) {
            die('Erreur : Aucun festival trouvé dans cette ville inexistant');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <?php
        // Display the title
        echo '<h1>' . $title . '</h1>';

        // Display the list of festivals
        if ($single) {
            displayFestival($festival);
        } else {
            displayFestivals($festivals);
        }
    ?>
</body>
</html>