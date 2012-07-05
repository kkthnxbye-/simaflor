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
include '../dao/coloresDAO.php';
include '../entities/colores.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../colores/color_editar.php";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if ($codigo == "" || $nombre == "") {
    header($location . "?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit();
}

$colores = new colores();
$coloresDAO = new coloresDAO();

$colores = $coloresDAO->getByCodigo($codigo);

if ($colores != null) {
    if($colores->getId() != $id){
    header($location . "?id=$id&n=$nombre&d=$descripcion&er2");
    exit();
    }
}

$colores = $coloresDAO->getById($id);
$colores->setId($id);
$colores->setCodigo($codigo);
$colores->setNombre($nombre);
$colores->setDescripcion($descripcion);
$coloresDAO->update($colores);
header("Location: ../../colores/lista.php?ok");
exit;
?>
