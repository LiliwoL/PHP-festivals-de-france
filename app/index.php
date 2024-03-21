<!DOCTYPE html>
<html>
<head>
    <title>Liste des festivals de France</title>
</head>
<body>

    <h1>Liste des festivals de France</h1>
    <?php
        // Include the file that contains the connexion function
        require('inc/connexion.php');

        // Include the file that contains the function to manage the festivals
        require('inc/festivals.php');

        // Get the list of festivals
        $festivals = selectAllFestivals();

        // Display the list of festivals
        displayFestivals( $festivals );
    ?>
</body>
</html>
