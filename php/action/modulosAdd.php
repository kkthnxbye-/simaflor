<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/modulosDAO.php';
include '../entities/modulos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre = accents2HTML($_POST['nombre']);
$modulo_raiz = $_POST['modulo_raiz'];

if($modulo_raiz == 0 || $nombre == ""){
   header("Location: ../../modulos/modulos_crear.php?m=$modulo_raiz&n=$nombre&er1");
   exit;
}

$modulosDAO = new modulosDAO();
$modulos = new modulos;
$modulos->setNombre($nombre);
$modulos->setIdMenuRaiz($modulo_raiz);
$modulosDAO->save($modulos);

header("Location: ../../modulos/lista.php?ok");
exit;
?>
