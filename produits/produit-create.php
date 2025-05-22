<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajoutée un produit</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Ajoutée un produit</h1>
        <form action="produit-store.php" method="post"> 
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Prix
                <input type="number" name="prix" step="any">
            </label>

            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>