<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: client-index.php');
    exit;
}


require_once('../classes/CRUD.php');

$crud = new CRUD;

$insert = $crud->insert('clients', $_POST);

header('location:client-show.php?id='.$insert);



?>