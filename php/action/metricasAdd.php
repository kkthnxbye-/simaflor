<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/metricasDAO.php';
include '../entities/metricas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$metricasDAO = new metricasDAO();
$metricas = new metricas;


if($nombre == ""){
   header("Location: ../../metricas/metricas_crear.php?n=$nombre&hb=$habilitado&er1");
   exit;
}

if ($habilitado == "on"){
$metricas->setHabilitado(1);
}else{
$metricas->setHabilitado(0);
}

$metricas->setNombre($nombre);


$metricasDAO->save($metricas);
header("Location: ../../metricas/lista.php?ok");
exit;
?>
