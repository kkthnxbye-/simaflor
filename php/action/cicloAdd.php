<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/ciclosDAO.php';
include '../entities/ciclos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($nombre == ""){
    header("Location: ../../ciclos/ciclo_crear.php?d=$descripcion&er1");
    exit;
}

$ciclosDAO = new ciclosDAO();
$ciclos = new ciclos();

$ciclos->setNombre($nombre);
$ciclos->setDescripcion($descripcion);
$ciclosDAO->save($ciclos);

header("Location: ../../ciclos/lista.php?ok");
exit;

?>
