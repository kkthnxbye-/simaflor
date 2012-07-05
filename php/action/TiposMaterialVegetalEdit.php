<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMaterialVegetalDAO.php';
include '../entities/TiposMaterialVegetal.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);

$TiposMaterialVegetal = new TiposMaterialVegetal();
$TiposMaterialVegetalDAO = new TiposMaterialVegetalDAO();


// Valida los no nulos.
if ($nombre != '') {

    $TiposMaterialVegetal->setId($id);
    $TiposMaterialVegetal->setNombre($nombre);

    $TiposMaterialVegetalDAO->update($TiposMaterialVegetal);
    $location = "Location: ../../TiposMaterialVegetal/TiposMaterialVegetalList.php";

    header($location . "?ok");
    exit;
    
} else {
    $location = "Location: ../../TiposMaterialVegetal/TiposMaterialVegetalEditar.php";
    header($location . "?id=$id&er1");
    exit;
}
?>