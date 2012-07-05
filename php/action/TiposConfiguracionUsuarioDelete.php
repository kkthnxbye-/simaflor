<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionUsuarioDAO.php';
include '../entities/TiposConfiguracionUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$TiposConfiguracionUsuarioDAO = new TiposConfiguracionUsuarioDAO();

$location = "Location: ../../TiposConfiguracionUsuario/TiposConfiguracionUsuarioList.php";

if($TiposConfiguracionUsuarioDAO->delete($_REQUEST['id']) === 1){
  header($location . '?ok');
  exit;
}else{
    header($location . '?er3');
    exit;  
}





?>
