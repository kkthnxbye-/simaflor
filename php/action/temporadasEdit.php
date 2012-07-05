<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/temporadasDAO.php';
include '../entities/temporadas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);
$habilitado = $_POST['habilitado'];
$id = $_POST['id'];

if($nombre == ""){
header("Location: ../../temporadas/temporadas_editar.php?id=$id&er1");
exit;
}

$temporadasDAO = new temporadasDAO();
$temporadas = $temporadasDAO->getById($id);
$temporadas->setNombre($nombre);
$temporadas->setHabilitado($habilitado);

if ($habilitado == "on"){
$temporadas->setHabilitado(1);
}else{
$temporadas->setHabilitado(0);
}

$temporadasDAO->update($temporadas);
header("Location: ../../temporadas/lista.php?ok");
exit;
?>
