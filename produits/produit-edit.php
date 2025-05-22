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
    <title>Éditer un produit</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Éditer un produit</h1>
        <form action="produit-update.php" method="post"> 
                <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom; ?>">
            </label>
            <label>Prix
                <input type="number" name="prix" step="any" value="<?= $prix; ?>">
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>