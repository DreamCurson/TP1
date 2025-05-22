<?php
require_once('../classes/CRUD.php');

$crud = new CRUD;

$produit_id = $_POST['produit_id'];
$quantite = $_POST['quantite'];
$client_id = $_POST['client_id'];

$date = date('Y-m-d');

// Comme la commande est relié à la facture on la crée en premier
$facture_data = [
    'client_id' => $client_id,
    'date_facture' => $date 
];

$facture_id = $crud->insert('factures', $facture_data);

// Si la facture est créer on crée la commande
if ($facture_id) {
    $commande_data = [
        'facture_id' => $facture_id,  
        'produit_id' => $produit_id,  
        'quantite' => $quantite 
    ];

    $commande_id = $crud->insert('commandes', $commande_data);

    if ($commande_id) {
        header('location:commande-show.php?id=' . $commande_id);
        exit;
    } else {
        header('location:commande-index.php');
        exit;
    }
} else {
    header('location:commande-index.php');
    exit;
}
?>
