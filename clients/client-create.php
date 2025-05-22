<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un Client
    </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Créer un client</h1>
        <form action="client-store.php" method="post"> 
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Email
                <input type="email" name="email">
            </label>

            <input type="submit" class="btn" value="Sauvegarder">
        </form>
    </div>
</body>
</html>