<?php
require_once('../classes/CRUD.php');

$crud = new CRUD();


if (isset($_POST['id'])) {
    $facture_id = $_POST['id'];

    if ($crud->deleteCommandByFacture($facture_id)) {
        if ($crud->delete('factures', $facture_id, 'id')) {
            header("Location: commande-list.php?message=Commande supprimée avec succès.");
            exit;
        } else {
            echo "Erreur lors de la suppression de la facture.";
        }
    } else {
        echo "Erreur lors de la suppression des commandes associées.";
    }
} else {
    echo "ID non fourni.";
}
?>
