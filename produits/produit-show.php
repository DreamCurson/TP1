<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('../classes/CRUD.php');
    $id = $_GET['id'];
    $crud = new CRUD;
    $selectId = $crud->selectId('produits', $id);
    if($selectId){
        extract($selectId);

    }else{
        header('location:produit-index.php');
    }
}else{
    header('location:produit-index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir le produit</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Produit</h1>
        <p><strong>Nom: </strong><?= $nom; ?></p>
        <p><strong>Prix: </strong><?= $prix; ?></p>
        
        <a href="produit-edit.php?id=<?= $id;?>" class="btn">Modifier</a>
        <form action="produit-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id;?>">
            <button type="submit" class="btn red">Supprimer</button>
        </form>

    </div>
</body>
</html>