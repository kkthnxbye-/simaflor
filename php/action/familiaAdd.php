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
include '../dao/familiasDAO.php';
include '../entities/familias.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$location = "Location: ../../familias/familia_crear.php"; 

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$familiasDAO = new familiasDAO();
$familias = new familias;

if ($familiasDAO->getBycodigo($codigo) != null){
	header($location . "?&n=$nombre&d=$descripcion&er2");
        exit;
}

$familias->setCodigo($codigo);
$familias->setNombre($nombre);
$familias->setDescripcion($descripcion);
$familiasDAO->save($familias);

header("Location: ../../familias/lista.php?ok");
exit;
?>
