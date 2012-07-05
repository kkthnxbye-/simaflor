<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/UsuariosDAO.php';
include '../entities/usuarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$UsuariosDAO = new UsuariosDAO();
if ($UsuariosDAO->delete($_GET['id']) === 1) {
    header("Location: ../../Usuarios/UsuariosList.php?ok");
    exit;
} else {
    header("Location: ../../Usuarios/UsuariosList.php?er3");
    exit;
}
?>
