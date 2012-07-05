<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMaterialVegetalDAO.php';
include '../entities/TiposMaterialVegetal.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposMaterialVegetalDAO = new TiposMaterialVegetalDAO();
$location = "Location: ../../TiposMaterialVegetal/TiposMaterialVegetalList.php";

if($TiposMaterialVegetalDAO->delete($_REQUEST['id']) === 1 ){
header($location . '?ok');
exit;
}else{
    header($location . '?er3');
exit;
}
?>
