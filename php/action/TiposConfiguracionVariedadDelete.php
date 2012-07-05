<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionVariedadDAO.php';
include '../entities/TiposConfiguracionVariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposConfiguracionVariedadDAO = new TiposConfiguracionVariedadDAO();


if($TiposConfiguracionVariedadDAO->delete($_REQUEST['id'])){
$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadList.php";
header($location . '?ok');
exit;
}else{
$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadList.php";
header($location . '?er3');
exit;    
}
?>
