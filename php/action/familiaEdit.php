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

$location = "Location: ../../familias/familia_editar.php";
    
foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$familia = new familias();
$familias = new familias();
$familiasDAO = new familiasDAO();

$familia = $familiasDAO->getByCodigo($codigo);

if ($familia != null){
    if($familia->getId() != $id){
        header($location . "?id=$id&n=$nombre&d=$descripcion&er2");
        exit;
    }
}

$familias = $familiasDAO->getById($id);
$familias->setId($id);
$familias->setCodigo($codigo);
$familias->setNombre($nombre);
$familias->setDescripcion($descripcion);
$familiasDAO->update($familias);

header("Location: ../../familias/lista.php?ok");
exit;

?>
