<?php session_start();
/**
 * @author Brayan Acebo
 */

include '../dao/daoConnection.php';
include '../dao/materialesVegetalesDAO.php';
include '../entities/materialesVegetales.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../materialesVegetales/materialesVegetales_crear.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$idTipoMaterialVegetal = $_POST['idTipoMaterialVegetal'];
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?c=$codigo&n=$nombre&tm=$idTipoMaterialVegetal&d=$descripcion&er1");
    exit;
}

$materialesVegetalesDAO = new materialesVegetalesDAO();
$materialesVegetales = new materialesVegetales;
if ($materialesVegetalesDAO->getBycodigo($codigo) != null){
	header($location . "?&n=$nombre&tm=$idTipoMaterialVegetal&d=$descripcion&er2");
    exit;
}

$materialesVegetales->setCodigo($codigo);
$materialesVegetales->setNombre($nombre);
$materialesVegetales->setDescripcion($descripcion);
$materialesVegetales->setHabilitado(1);
$materialesVegetales->setIdTipoMaterialVegetal($idTipoMaterialVegetal);
$materialesVegetalesDAO->save($materialesVegetales);

header("Location: ../../materialesVegetales/lista.php?ok");
exit;
?>
