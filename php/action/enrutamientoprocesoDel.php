<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/enrutamientoprocesoDAO.php';
include '../entities/enrutamientoproceso.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$enrutamientoprocesoDAO = new enrutamientoprocesoDAO();
if($enrutamientoprocesoDAO->delete($_REQUEST['id']) == 1){
header("Location: ../../enrutamientoproceso/lista.php?ok");
exit;
}else{
header("Location: ../../enrutamientoproceso/lista.php?er3");
exit;    
}
?>
