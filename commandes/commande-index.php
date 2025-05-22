<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

$clients = $crud->select('clients', 'nom');
$produits = $crud->select('produits', 'nom');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Créer une commande</title>
</head>
<body>
    <div class="container">
    <h1>Créer une commande</h1>
    <nav>
        <ul class="navigation-bouton">
            <a href="commande-list.php">Voir les commandes</a>
        </ul>
    </nav>
    <h2>Selectionner un produit</h2>
    <form action="commande-store.php" method="post"> 
        <label>Produit
                <select name="produit_id">
                    <?php
                    foreach($produits as $produit){
                    ?>
                    <option value="<?= $produit['id'];?>"><?= $produit['nom'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </label>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" min="1" value="1">

            <label>Client
                <select name="client_id">
                    <?php
                    foreach($clients as $client){
                    ?>
                    <option value="<?= $client['id'];?>"><?= $client['nom'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </label>

        <input type="submit" class="btn" value="Sauvegarder">
    </form>
    </div>
</body>
</html>
