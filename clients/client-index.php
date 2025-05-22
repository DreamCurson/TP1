<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

$select = $crud->select('clients', 'nom');

// echo "<pre>";
// print_r($select);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <ul class="navigation">
            <a href="../index.php">Index</a>
        </ul>
    </nav>

    <h1>Clients</h1>
    <table>
        <thead>
            <tr>
                <th>Noms</th>
                <th>Emails</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><?= $row['nom']?></td>
                <td><?= $row['email']?></td>
                <td><a href="client-show.php?id=<?= $row['id'];?>" class="btn">Voir</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="client-create.php" class="btn">New Client</a>
</body>
</html>