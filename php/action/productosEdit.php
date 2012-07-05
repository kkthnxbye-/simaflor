<?php session_start();


include '../dao/daoConnection.php';
include '../dao/productosDAO.php';
include '../entities/productos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../productos/productos_editar.php";

$id = $_POST['id'];
$idFamilia = $_POST['idFamilia'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($idFamilia ==  "" || $codigo == "" || $nombre == "") {
header($location . "?id=$id&fa=$idFamilia&c=$codigo&n=$nombre&d=$descripcion&er1");
exit;
}

$productosDAO = new productosDAO();
$productos = new productos();
$productos2 = new productos();

$productos2 = $productosDAO->getByCodigo($codigo);

if ($productos2 != null){
    if($productos2->getId() != $id){
	header($location . "?id=$id&fa=$idFamilia&n=$nombre&d=$descripcion&er2");
        exit;
    }
}



$productos = $productosDAO->getById($id);
$productos->setId($id);
$productos->setCodigo($codigo);
$productos->setNombre($nombre);
$productos->setDescripcion($descripcion);
$productos->setIdFamilia($idFamilia);
$productosDAO->update($productos);
header("Location: ../../productos/lista.php?ok");
exit;
?>
