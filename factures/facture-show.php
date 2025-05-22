<?php
if(isset($_GET['id']) && $_GET['id'] != null){
    require_once('../classes/CRUD.php');
    $id = $_GET['id'];
    $crud = new CRUD;
    
    // Retrieve the facture record
    $selectId = $crud->selectId('factures', $id);
    if($selectId){
        extract($selectId);

        $client = $crud->selectId('clients', $client_id);
        
        if ($client) {
            $clientName = $client['nom'];
        } else {
            $clientName = 'Client not found';
        }

    } else {
        header('location:../commandes/commande-list.php');
    }
}else{
    header('location:../commandes/commande-list.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Facture de <?= $clientName; ?></h1>
        <p><strong>Nom: </strong><?= $clientName; ?></p>
        <p><strong>Date: </strong><?= $date_facture; ?></p>
        
        <p class="info">Pour supprimer une facture vous devez supprimer la commande relié</p>
        <a href="../commandes/commande-list.php" class="btn">Retour à la liste</a>

    </div>
</body>
</html>

