<?php

session_start();


include '../dao/daoConnection.php';
include '../dao/productosDAO.php';
include '../entities/productos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../productos/productos_crear.php";

$idFamilia = $_POST['idFamilia'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($idFamilia ==  "" || $codigo == "" || $nombre == "") {
header($location . "?fa=$idFamilia&c=$codigo&n=$nombre&d=$descripcion&er1");
exit;
}

$productosDAO = new productosDAO();
$productos = new productos;
if ($productosDAO->getBycodigo($codigo) != null) {
    header($location . "?fa=$idFamilia&n=$nombre&d=$descripcion&er2");
    exit;
}

$productos->setCodigo($codigo);
$productos->setNombre($nombre);
$productos->setDescripcion($descripcion);
$productos->setHabilitado(1);
$productos->setIdFamilia($idFamilia);
$productosDAO->save($productos);

header("Location: ../../productos/lista.php?ok");
exit;
?>
