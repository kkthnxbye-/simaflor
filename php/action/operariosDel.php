<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/operariosDAO.php';
include '../entities/operarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$operariosDAO = new operariosDAO();
$foto = $_GET['foto'];

if($operariosDAO->delete($_REQUEST['id'])===1){
    @unlink("../../operarios/img/".$foto);
header("Location: ../../operarios/lista.php?ok");
exit;
}else{
header("Location: ../../operarios/lista.php?er3");
exit;    
}
?>
