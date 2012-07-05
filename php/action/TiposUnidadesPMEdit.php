<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposUnidadesPMDAO.php';
include '../entities/TiposUnidadesPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposUnidadesPM/TiposUnidadesPMEdit.php";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['codigo']);
$descripcion = accents2HTML($_POST['descripcion']);
$habilitado = $_POST['habilitado'];

if($codigo == "" || $nombre == ""){
    header($location . "?id=$id&c=$codigo&n=$nombre&d=$descripcion&h=$habilitado&er1");
    exit;
}

$TiposUnidadesPM = new TiposUnidadesPM();
$TiposUnidadesPM2 = new TiposUnidadesPM();
$TiposUnidadesPMDAO = new TiposUnidadesPMDAO();

$TiposUnidadesPM2 = $TiposUnidadesPMDAO->getByCodigo($codigo);

if ($TiposUnidadesPM2 != null){
    if($TiposUnidadesPM2->getId() != $id){
	header($location . "?id=$id&n=$nombre&d=$descripcion&h=$habilitado&er2");
        exit;
    }
}


$TiposUnidadesPM = $TiposUnidadesPMDAO->getById($id);
// Valida los no nulos.
if($codigo != '' || $nombre != '') {
    
    $TiposUnidadesPM->setId($id);
    $TiposUnidadesPM->setCodigo($codigo);
    $TiposUnidadesPM->setNombre($nombre);
    $TiposUnidadesPM->setDescripcion($descripcion);
	
    if ($habilitado == "on"){
		$TiposUnidadesPM->setHabilitado(1);
	}else{
		$TiposUnidadesPM->setHabilitado(0);
	}

    $TiposUnidadesPMDAO->update($TiposUnidadesPM);
    $location = "Location: ../../TiposUnidadesPM/TiposUnidadesPMList.php";
    header($location . '?ok');
    exit;
}
header($location);
exit;
?>