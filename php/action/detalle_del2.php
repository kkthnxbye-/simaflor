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
include '../dao/detallepedidoDAO.php';
include '../entities/detallepedido.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$detallepedidoDAO = new detallepedidoDAO();

$id = $_REQUEST['id'];

if($detallepedidoDAO->delete($id) == 1){
   echo "$(function(){  msn.ok().mostrar('Proceso Exitoso.');  });";
}
else{
   echo "$(function(){  msn.error().mostrar('Este item no puede ser elimando por que tiene items relacionados actualmente.');  });";
}

?>
