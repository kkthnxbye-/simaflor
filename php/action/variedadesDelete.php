<?php session_start();

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */

include '../dao/daoConnection.php';
include '../dao/VariedadesDAO.php';
include '../entities/Variedades.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$VariedadesDAO = new VariedadesDAO();

if($VariedadesDAO->delete($_GET['id']) == 1){
    @unlink("../../Variedades/img/".$_GET['img']);
   header("Location: ../../Variedades/VariedadesList.php?ok");
   exit; 
}else{
    header("Location: ../../Variedades/VariedadesList.php?er3");
    exit;
}

?>
