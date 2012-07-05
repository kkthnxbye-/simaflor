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

$location = "Location: ../../labores/labor_editar.php";

$id = $_POST['id'];
$codigo = accents2HTML($_POST['codigo']);
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);
if(isset($_POST['habilitado'])){
   $habilitado = 1;
}else{
   $habilitado = 0;
}

$fotoOld = $_POST['image2'];

if ($codigo == "" || $nombre == "") {
    header($location . "?er1");
    exit;
}

$lDAO = new LaboresDAO();
$la = new Labores();

$check_ = new Labores();

$check_ = $lDAO->getByCode($codigo);

if ($check_ != null) {
    if ($check_->getId() != $id) {
        header($location . "?id=$id&n=$nombre&d=$descripcion&h=$habilitado&er2");
        exit;
    }
}

$fileName = $_FILES['file_name']['name'];
if($fileName != ""){
   $extension = end(explode(".", $fileName));
   $location_ = $_FILES['file_name']['tmp_name'];
   $new_name = $id.'.'.$extension;
   $dest = '../../labores/images/'.$new_name;
   @unlink("../../labores/images/".$fotoOld);
   copy($location_, $dest);
   $image = $new_name;
}else{
   $image = $fotoOld;
}
$la->setId($id);
$la->setCodigo($codigo);
$la->setNombre($nombre);
$la->setDescripcion($descripcion);
$la->setHabilitado($habilitado);
$la->setFoto($image);
$lDAO->update($la);
header("Location: ../../labores/lista.php?ok");
exit;