<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */

session_start();


include '../dao/daoConnection.php';
include '../dao/opcionesDAO.php';
include '../entities/opciones.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$opcionesDAO = new opcionesDAO();
if ($opcionesDAO->delete($_GET['id']) == 1)  {
    header("Location: ../../opciones/lista.php?ok");
    exit;
} else{
    header("Location: ../../opciones/lista.php?er3");
    exit;
}
?>
