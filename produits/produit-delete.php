<?php

$id = $_POST['id'];
require_once('../classes/CRUD.php');

$crud = new CRUD;

$delete = $crud->delete('produits', $id);

if($delete){
    header('location:produit-index.php');
}else{
    echo "Error";
}


?>