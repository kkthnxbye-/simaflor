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

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

if($codigo == "" || $nombre == ""){
    header("Location: ../../breeders/breeders_crear.php?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}


$breedersDAO = new breedersDAO();
$breeders = new breeders;

$breeders2 = new breeders;

$breeders2 = $breedersDAO->getByCodigo($codigo);

if($breeders2 != null){
    if($breeders2->getId() != $id){
    header("Location: ../../breeders/breeders_crear.php?id=$id&n=$nombre&d=$descripcion&er2");
    exit;
    }
}

$breeders = $breedersDAO->getById($id);
$breeders->setId($id);
$breeders->setCodigo($codigo);
$breeders->setNombre($nombre);
$breeders->setDescripcion($descripcion);


$breedersDAO->update($breeders);
header("Location: ../../breeders/lista.php?ok");
exit;
?>
