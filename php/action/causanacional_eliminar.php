<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/causasnacionalDAO.php';
include '../entities/causasnacional.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$causasnacionalDAO = new causasnacionalDAO();
if($causasnacionalDAO->delete($_REQUEST['id']) === 1){
    header("Location: ../../causasnacional/lista.php?ok");
    exit;
}else{
    header("Location: ../../causasnacional/lista.php?er3");
    exit;
};
?>
