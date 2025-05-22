<?php
require_once('../classes/CRUD.php');

$crud = new CRUD();

if (isset($_GET['id'])) {
    $facture_id = $_GET['id'];

    $sql = "SELECT clients.nom, commandes.facture_id, factures.date_facture, 
                   GROUP_CONCAT(CONCAT(produits.nom, ' x ', commandes.quantite, '<br>') SEPARATOR '') AS produits
            FROM commandes
            JOIN factures ON commandes.facture_id = factures.id
            JOIN clients ON factures.client_id = clients.id
            JOIN produits ON commandes.produit_id = produits.id
            WHERE factures.id = $facture_id
            GROUP BY factures.date_facture";

    $select = $crud->query($sql);
    
    if (!$select) {
        echo "Aucune commande trouvée pour cet identifiant.";
        exit;
    }
    
    $row = $select->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID non fourni.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <ul>
            <a href="../index.php">Index</a>
        </ul>
    </nav>

    <h1>Détails de la commande</h1>
    <table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Produits</th>
                <th>Date de Facture</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= ($row['nom']) ?></td>
                <td><?= ($row['produits']) ?></td>
                <td><?= ($row['date_facture']) ?></td>
            </tr>
        </tbody>
    </table>

    <form action="commande-delete-facture.php" method="post">
    <input type="visible" name="id" value="<?= $facture_id; ?>">
    <button type="submit" class="btn red">Supprimer</button>
</form>

    <a href="commande-list.php" class="btn">Retour</a>
</body>
</html>
