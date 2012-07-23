<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/notasXPedidoDAO.php';
include '../entities/notasXPedido.php';

foreach ($_POST as $key => $value) {
    $$key = $value;
}

$notasDAO = new NotasXPedidoDAO();

if($notasDAO->deleteNotas($id)){
    echo "ok";
}else{
    echo "er3";
}
?>
