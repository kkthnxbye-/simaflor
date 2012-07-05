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

$location = "Location: ../../colores/color_crear.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit();
}

$coloresDAO = new coloresDAO();
$colores = new colores;


if ($coloresDAO->getBycodigo($codigo) != null){
	header($location . "?n=$nombre&d=$descripcion&er2");
        exit;
}

$colores->setId($coloresDAO->getLastId()+1);
$colores->setCodigo($codigo);
$colores->setNombre($nombre);
$colores->setDescripcion($descripcion);
$coloresDAO->save($colores);

header("Location: ../../colores/lista.php?ok");
exit;


?>
