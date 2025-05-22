<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    require_once('../classes/CRUD.php');
    $id = $_GET['id'];
    $crud = new CRUD;
    $selectId = $crud->selectId('clients', $id);
    if($selectId){
        extract($selectId);
    }else{
        header('location:client-index.php');
    }
}else{
    header('location:client-index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Client</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Éditer le client</h1>
        <form action="client-update.php" method="post"> 
                <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Nom
                <input type="text" name="nom" value="<?= $nom; ?>">
            </label>
            <label>Email
                <input type="email" name="email" value="<?= $email; ?>">
            </label>
            <input type="submit" class="btn" value="Sauvegarder">
        </form>
    </div>
</body>
</html>