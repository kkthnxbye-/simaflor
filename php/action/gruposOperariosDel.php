<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/gruposOperariosDAO.php';
include '../entities/gruposOperarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$gruposOperariosDAO = new gruposOperariosDAO();
$resul = $gruposOperariosDAO->delete($_REQUEST['id']);
if($resul==1){
header("Location: ../../gruposOperarios/lista.php?ok");
exit;
}
if($resul=="er"){
header("Location: ../../gruposOperarios/lista.php?er3");
exit;    
}

?>
