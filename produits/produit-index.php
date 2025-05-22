<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

$select = $crud->select('produits', 'nom');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <ul class="navigation">
            <a href="../index.php">Index</a>
        </ul>
    </nav>

    <h1>Produits</h1>
    <table>
        <thead>
            <tr>
                <th>Noms</th>
                <th>Prix</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($select as $row){
            ?>
            <tr>
                <td><?= $row['nom']?></td>
                <td><?= $row['prix']?></td>
                <td><a href="produit-show.php?id=<?= $row['id'];?>" class="btn">Voir</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="produit-create.php" class="btn">Nouveau Produit</a>
</body>
</html>