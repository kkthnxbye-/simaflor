<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/laboresDAO.php';
include '../entities/labores.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../labores/labor_crear.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

//echo $codigo.''.$nombre.''.$descripcion;
//exit;

if(isset($_POST['habilitado'])){
   $habilitado = 1;
}else{
   $habilitado = 0;
}

if($codigo == "" || $nombre == ""){
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit();
}

$lDAO = new LaboresDAO();
$la = new Labores();


if ($lDAO->getByCode($codigo) != null){
	header($location . "?n=$nombre&d=$descripcion&er2");
        exit;
}



$la->setCodigo($codigo);
$la->setNombre($nombre);
$la->setDescripcion($descripcion);
$la->setFoto(0);
$la->setHabilitado($habilitado);
$lDAO->save($la);

$last_id = $lDAO->getLastId();

/*
 * Subo Imagen
 */

$fileName = $_FILES['file_name']['name'];
if($fileName != ""){
   $extension = end(explode(".", $fileName));
   $location_ = $_FILES['file_name']['tmp_name'];
   $new_name = $last_id.'.'.$extension;
   $dest = '../../labores/images/'.$new_name;
   copy($location_, $dest);
   $image = $new_name;
}else{
   $image = 0;
}

$la->setId($last_id);
$la->setCodigo($codigo);
$la->setNombre($nombre);
$la->setDescripcion($descripcion);
$la->setFoto($image);
$la->setHabilitado($habilitado);
$lDAO->update($la);
//echo $fileName."-".$extension."-".$new_name."-".$descripcion;
header("Location: ../../labores/lista.php?ok");
exit;

