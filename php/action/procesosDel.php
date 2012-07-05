<?php

session_start();


include '../dao/daoConnection.php';
include '../dao/procesosDAO.php';
include '../entities/procesos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$procesosDAO = new procesosDAO();
$procesosDAO->delete($_REQUEST['id']);
header("Location: ../../procesos/lista.php?ok");
exit;
?>
