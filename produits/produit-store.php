<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: produit-index.php');
    exit;
}


require_once('../classes/CRUD.php');

$crud = new CRUD;

$insert = $crud->insert('produits', $_POST);

header('location:produit-show.php?id='.$insert);



?>