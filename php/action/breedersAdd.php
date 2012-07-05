<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/breedersDAO.php';
include '../entities/breeders.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

if($codigo == "" || $nombre == ""){
    header("Location: ../../breeders/breeders_crear.php?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$breedersDAO = new breedersDAO();
$breeders = new breeders;


if($breedersDAO->getByCodigo($codigo) != null){
    header("Location: ../../breeders/breeders_crear.php?n=$nombre&d=$descripcion&er2");
    exit;
}

$breeders->setCodigo($codigo);
$breeders->setNombre($nombre);
$breeders->setDescripcion($descripcion);
$breeders->setHabilitado(1);


$breedersDAO->save($breeders);
header("Location: ../../breeders/lista.php?ok");
exit;
?>
