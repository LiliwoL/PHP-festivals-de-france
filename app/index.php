<?php
    require('inc/init.php');
    require('inc/festivals.php');
?>


Page d'accueil de Festivals de France


<h1>Liste des festivals</h1>
<?php
    $festivals = selectAllFestivals();

    foreach ($festivals as $festival)
    {
        echo '<h2>' . $festival['nom_du_festival'] . '</h2>';
        echo '<p>' . $festival['site_internet_du_festival'] . '</p>';
    }
?>