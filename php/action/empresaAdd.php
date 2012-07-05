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
include '../dao/empresasDAO.php';
include '../entities/empresas.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if($nombre == "" || $nit == ""){
   header("Location: ../../empresas/empresa_crear.php?er1");
   exit;
}

$empresasDAO = new empresasDAO();
$empresas = new empresas;
$empresas->setId($empresasDAO->getLastId()+1);
$empresas->setNombre($nombre);
$empresas->setNit($nit);
if ($esproveedor == "on"){
$empresas->setEsProveedor(1);
}else{
$empresas->setEsProveedor(0);
}
if ($escliente == "on"){
$empresas->setEsCliente(1);
}else{
$empresas->setEsCliente(0);
}
if ($esfinca == "on"){
$empresas->setEsFinca(1);
}else{
$empresas->setEsFinca(0);
}
if ($habilitado == "on"){
$empresas->setHabilitado(1);
}else{
$empresas->setHabilitado(0);
}
$empresasDAO->save($empresas);
header("Location: ../../empresas/lista.php?ok");
exit;
?>
