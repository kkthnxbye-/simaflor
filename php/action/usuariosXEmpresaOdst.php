<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/UsuariosXEmpresaDAO.php';
include '../entities/UsuariosXEmpresa.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$idUsuario = $_POST['idUsuario'];
$total = $_POST['total'];


$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$UsuariosXEmpresaDAO->deletebyusuario($idUsuario);
for ($ss = 1; $ss <= $total; $ss++) {

    if ($_POST['ck_' . $ss] == "on") {
        $UsuariosXEmpresa = new UsuariosXEmpresa();
        $UsuariosXEmpresa->setIdEmpresa($_REQUEST['prod_' . $ss]);
        $UsuariosXEmpresa->setIdUsuario($idUsuario);
        $UsuariosXEmpresaDAO->save($UsuariosXEmpresa);
    }
}

header("Location: ../../Usuarios/UsuariosList.php?ok");
exit;
?>
