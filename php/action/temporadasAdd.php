<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/temporadasDAO.php';
include '../entities/temporadas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$nombre =  accents2HTML($_POST['nombre']);
$habilitado =  $_POST['habilitado'];

if($nombre == ""){
    header("Location: ../../temporadas/temporadas_crear.php?h=$habilitado&er1");
    exit;
}

$temporadasDAO = new temporadasDAO();
$temporadas = new temporadas;
$temporadas->setNombre($nombre);
$temporadas->setHabilitado($habilitado);

if ($habilitado == "on"){
$temporadas->setHabilitado(1);
}else{
$temporadas->setHabilitado(0);
}


$temporadasDAO->save($temporadas);
header("Location: ../../temporadas/lista.php?ok");
exit;
?>
