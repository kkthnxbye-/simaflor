<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposAreaPMDAO.php';
include '../entities/TiposAreaPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposAreaPMDAO = new TiposAreaPMDAO();


if($TiposAreaPMDAO->delete($_REQUEST['id']) === 1){
$location = "Location: ../../TiposAreaPM/TiposAreaPMList.php";
header($location . '?ok');
exit;
}else{
   $location = "Location: ../../TiposAreaPM/TiposAreaPMList.php";
header($location . '?er3');
exit; 
}
?>
