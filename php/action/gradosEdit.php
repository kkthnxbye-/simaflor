<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 *
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/gradosDAO.php';
include '../entities/grados.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../grados/grado_editar.php";

$id = $_POST['id'];
$idProducto = $_POST['idProducto'];
$idProceso = $_POST['idProceso'];
$codigo = $_POST['codigo'];
$nombre= accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == "" || $idProducto == "" || $idProceso == ""){
    header($location . "?id=$id&pd=$idProducto&pc=$idProceso&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$gradosDAO = new gradosDAO();
$grados = new grados;
$grados2 = new grados;

$grados2 = $gradosDAO->getByCodigo($codigo);

if($grados2 != null){
    if($grados2->getId() != $id){
    header($location . "?id=$id&pd=$idProducto&pc=$idProceso&n=$nombre&d=$descripcion&er2");
    exit;
    }
}


$grados = $gradosDAO->getById($id);
$grados->setIdProceso($idProceso);
$grados->setIdProducto($idProducto);
$grados->setCodigo($codigo);
$grados->setNombre($nombre);
$grados->setDescripcion($descripcion);
$grados->setHabilitado(1);
$gradosDAO->update($grados);
header("Location: ../../grados/lista.php?ok");
exit;
?>
