<?php
require_once('../classes/CRUD.php');

if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = $_GET['id'];  

    $crud = new CRUD;

    $commande = $crud->selectId('commandes', $id);

    if ($commande) {
        extract($commande);
        
        $facture = $crud->selectId('factures', $facture_id);
        
        if ($facture) {
            $client_id = $facture['client_id'];
            
            $client = $crud->selectId('clients', $client_id);

            if ($client) {
                $client_name = $client['nom'];
            } else {
                $client_name = "Erreur dans la table client";
            }
        } else {
            $client_name = "Erreur dans la facture";
        }
    } else {
        header('location:commande-index.php');
        exit;
    }
} else {
    header('location:commande-index.php');
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
    <div class="container">
        <h1>Détails de la commande</h1>
        <p><strong>Produit: </strong><?= $produit_id; ?></p>
        <p><strong>Quantité: </strong><?= $quantite; ?></p>
        <p><strong>Client: </strong><?= $client_name; ?></p>

        <a href="commande-edit.php?id=<?= $id;?>" class="btn">Modifier</a>

        <form action="commande-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <button type="submit" class="btn red">Annuler la commande</button>
        </form>
        <a href="commande-list.php">Voir toutes les commandes</a>
    </div>
</body>
</html>
