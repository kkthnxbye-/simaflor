<?php session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMovimientoInventarioDAO.php';
include '../entities/TiposMovimientoInventario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);
$suma = $_POST['suma'];

$location = "Location: ../../TiposMovimientoInventario/TiposMovimientoInventarioEdit.php";

$TiposMovimientoInventario = new TiposMovimientoInventario();
$TiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$TiposMovimientoInventario2 = new TiposMovimientoInventario();


$TiposMovimientoInventario2 = $TiposMovimientoInventarioDAO->getByCodigo($codigo);

if($codigo == "" || $nombre == ""){
    header($location."?id=$id&c=$codigo&n=$nombre&d=$descripcion&s=$suma&er1");
	exit;
}

if ($TiposMovimientoInventario2 != null){
    if($TiposMovimientoInventario2->getId() != $id){
    header($location."?id=$id&n=$nombre&d=$descripcion&s=$suma&er2");
	exit;
    }
}
$TiposMovimientoInventario = $TiposMovimientoInventarioDAO->getById($id);
// Valida los no nulos.

    
    $TiposMovimientoInventario->setId($id);
    $TiposMovimientoInventario->setCodigo($codigo);
    $TiposMovimientoInventario->setNombre($nombre);
    $TiposMovimientoInventario->setDescripcion($descripcion);
    $TiposMovimientoInventario->setHabilitado(1);
    $TiposMovimientoInventario->setSuma(0);
    if($suma == 'on'){
        $TiposMovimientoInventario->setSuma(1);
    }
    $TiposMovimientoInventarioDAO->update($TiposMovimientoInventario);
    $location = "Location: ../../TiposMovimientoInventario/TiposMovimientoInventarioList.php";
    header($location . '?ok');
    exit;

?>