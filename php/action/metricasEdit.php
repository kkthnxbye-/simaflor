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
include '../dao/metricasDAO.php';
include '../entities/metricas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$metricasDAO = new metricasDAO();
$metricas = $metricasDAO->getById($id);


if($nombre == ""){
   header("Location: ../../metricas/metricas_editar.php?n=$nombre&id=$id&er1");
   exit;
}

$metricas->setNombre($nombre);
$metricas->setHabilitado($habilitado);
$metricas->setId($id);



if ($habilitado == "on"){
$metricas->setHabilitado(1);
}else{
$metricas->setHabilitado(0);
}

/* if ($_FILES['imagen'][ 'name' ] != "") {
	$destino="../../metricas/img/".$_FILES['imagen'][ 'name' ];
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $metricas->setFoto($_FILES['imagen'][ 'name' ]);
} */
$metricasDAO->update($metricas);
header("Location: ../../metricas/lista.php?ok");
exit;
?>
