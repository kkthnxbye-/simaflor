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
include '../dao/procesosDAO.php';
include '../entities/procesos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../procesos/procesos_editar.php";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$procesosDAO = new procesosDAO();
$procesos = new procesos();
$procesos2 = new procesos();

$procesos2 = $procesosDAO->getByCodigo($codigo);

if ($procesos2 != null){
    if($procesos2->getId() !=  $id){
	header($location . "?id=$id&n=$nombre&d=$descripcion&er2");
        exit;
    }
}


$procesos = $procesosDAO->getById($id);
$procesos->setId($id);
$procesos->setCodigo($codigo);
$procesos->setNombre($nombre);
$procesos->setDescripcion($descripcion);
$procesosDAO->update($procesos);

header("Location: ../../procesos/lista.php?ok");
exit;
?>
