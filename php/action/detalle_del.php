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
if (empty($_SESSION['lista_detalles'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_detalles']);
}
$listadetalles_2 = array();
$id = $_REQUEST['id'];
$st=0;
$st2=0;
foreach ($listadetalles as $li_det){
	if ($st != $id){
		$listadetalles_2[$st2] = $li_det;
		$st2++;
	}
	$st++;
	
}
$_SESSION['lista_detalles'] = serialize($listadetalles_2);
?>
