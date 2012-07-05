<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposParametrosDAO.php';
include '../entities/TiposParametros.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposParametros/TiposParametrosEdit.php";

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($nombre == ""){
    header($location . "?id=$id&d=$descripcion&er1");
    exit;
}

$TiposParametros = new TiposParametros();
$TiposParametrosDAO = new TiposParametrosDAO();

$TiposParametros = $TiposParametrosDAO->getById($id);
    
    $TiposParametros->setId($id);
    $TiposParametros->setNombre($nombre);
    $TiposParametros->setDescripcion($descripcion);
    

    $TiposParametrosDAO->update($TiposParametros);
    $location = "Location: ../../TiposParametros/TiposParametrosList.php";
    header($location . '?ok');
    exit;
?>