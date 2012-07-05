<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */

session_start();

include '../dao/daoConnection.php';
include '../dao/gruposUsuarioDAO.php';
include '../entities/gruposUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$gruposUsuarioDAO = new gruposUsuarioDAO();

if($gruposUsuarioDAO->delete($_REQUEST['id'])===1){
    
   header("Location: ../../gruposUsuario/lista.php?ok");
   exit;
}else{
   header("Location: ../../gruposUsuario/lista.php?er3");
   exit;
}

?>
