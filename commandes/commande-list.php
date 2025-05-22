<?php
require_once('../classes/CRUD.php');

$crud = new CRUD();

// https://www.w3resource.com/mysql/aggregate-functions-and-grouping/aggregate-functions-and-grouping-group_concat.php#google_vignette
$sql = "SELECT clients.nom, commandes.facture_id, factures.date_facture, 
               GROUP_CONCAT(CONCAT(produits.nom, ' x ', commandes.quantite, '<br>') SEPARATOR '') AS produits
        FROM commandes
        JOIN factures ON commandes.facture_id = factures.id
        JOIN clients ON factures.client_id = clients.id
        JOIN produits ON commandes.produit_id = produits.id
        GROUP BY commandes.facture_id";  // Group by facture_id instead of date_facture

$select = $crud->query($sql);

// $stmt = $crud->query($sql);
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($results);
// echo "</pre>";

$date = $crud->select('factures', 'date_facture');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <ul class="navigation">
            <a href="../index.php">Index</a>
        </ul>
    </nav>

    <h1>Commandes</h1>
    <table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Produits</th>
                <th>Date</th>
                <th>Voir la commande</th>
                <th>Voir la facture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($select as $row) {
            ?>
            <tr>
                <td><?= ($row['nom']) ?></td> 
                <td><?= ($row['produits']) ?></td> 
                <td><?= ($row['date_facture']) ?></td> 
                <td><a href="commande-complete.php?id=<?= $row['facture_id']; ?>" class="btn">Détails</a></td>
                <td><a href="../factures/facture-show.php?id=<?= $row['facture_id']; ?>" class="btn">Factures</a></td> 
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <a href="commande-index.php" class="btn">Nouvelle commande</a>
</body>
</html>
