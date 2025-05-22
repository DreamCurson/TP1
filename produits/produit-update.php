<?php

require_once('../classes/CRUD.php');

$crud = new CRUD;
$update = $crud->update('produits', $_POST);

if($update){
    header('location:produit-index.php');
}else{
    echo "error";
}

?>