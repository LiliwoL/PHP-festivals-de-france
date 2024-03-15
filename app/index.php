<?php
    // Include the file that contains the connection to the database
    require_once 'inc/connexion.php';

    // Get the connection to the database
    $pdo = connectDb();
?>
<h1>Liste des festivals de France</h1>

<?php
    // Get the list of festivals
    $sql = 'SELECT * FROM festivals ORDER BY nom_du_festival ASC';
    $stmt = $pdo->query($sql);
    $festivals = $stmt->fetchAll();


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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>