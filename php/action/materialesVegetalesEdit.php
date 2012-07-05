<?php
/**
 * @author Brayan Acebo
 */

session_start();

include '../dao/daoConnection.php';
include '../dao/materialesVegetalesDAO.php';
include '../entities/materialesVegetales.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../materialesVegetales/materialesVegetales_editar.php";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$idTipoMaterialVegetal = $_POST['idTipoMaterialVegetal'];
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?id=$id&c=$codigo&n=$nombre&tm=$idTipoMaterialVegetal&d=$descripcion&er1");
    exit;
}

$materialesVegetales = new materialesVegetales();
$materialesVegetales2 = new materialesVegetales();
$materialesVegetalesDAO = new materialesVegetalesDAO();

$materialesVegetales2 = $materialesVegetalesDAO->getByCodigo($codigo);


if ($materialesVegetales2 != null){
    if($materialesVegetales2->getId() != $id){
	header($location . "?id=$id&n=$nombre&tm=$idTipoMaterialVegetal&d=$descripcion&er2");
        exit;
    }
}

$materialesVegetales = $materialesVegetalesDAO->getById($id);
$materialesVegetales->setId($id);
$materialesVegetales->setCodigo($codigo);
$materialesVegetales->setNombre($nombre);
$materialesVegetales->setDescripcion($descripcion);
$materialesVegetales->setIdTipoMaterialVegetal($idTipoMaterialVegetal);
$materialesVegetalesDAO->update($materialesVegetales);


header("Location: ../../materialesVegetales/lista.php?ok");
exit;
?>
