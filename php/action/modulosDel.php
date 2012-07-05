<?php

session_start();
include '../dao/daoConnection.php';
include '../dao/modulosDAO.php';
include '../entities/modulos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';
$modulosDAO = new modulosDAO();
if($modulosDAO->delete($_GET['id'])===1){
header("Location: ../../modulos/lista.php?ok");
exit;
}else{
    header("Location: ../../modulos/lista.php?er3");
exit;
}
?>
