<?php

session_start();
date_default_timezone_set("America/Bogota");

/* @Autor Brayan Acebo
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../dao/daoConnection.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


include '../dao/notasXPedidoDAO.php';
include '../entities/notasXPedido.php';


$notasDAO = new NotasXPedidoDAO();
$notas = new NotasXPedido();


foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$notas->setIdPedidoPm($idPedidoPm);
$notas->setIdVariedad($idVariedad);
$notas->setIdUsuario($idUsuario);
$notas->setFechaRegistro(date('Y/m/d H:i'));
$notas->setNota($nota);
$notasDAO->saveNota($notas);
echo "1";