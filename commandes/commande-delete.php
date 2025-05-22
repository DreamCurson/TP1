<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // echo "ID passed: " . ($id);

    require_once('../classes/CRUD.php');
    $crud = new CRUD();

    $delete = $crud->delete('commandes', $id);

    if ($delete) {
        echo "Deletion successful.";
        header('Location: commande-list.php');
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "ID non fourni pour la suppression.";
}
?>
