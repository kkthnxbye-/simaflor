<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/permisosXOpcionXGrupoUsuarioDAO.php';
include '../entities/permisosXOpcionXGrupoUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$l1 = $_REQUEST['id'];
$total = $_POST['total'];


$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisosXOpcionXGrupoUsuarioDAO->deletebygrupousuario($l1);
for($ss=1; $ss<= $total; $ss++){


	$permisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario;
	$permisosXOpcionXGrupoUsuario->setIdGrupoUsuario($l1);
	$permisosXOpcionXGrupoUsuario->setIdOpcion($_POST['ope_'.$ss]);
if ($_POST['ckc_'.$ss] == "on"){
        $permisosXOpcionXGrupoUsuario->setPermiteConsultar(1);
}
if ($_POST['ckm_'.$ss] == "on"){
        $permisosXOpcionXGrupoUsuario->setPermiteModificar(1);
}

if($_POST['ckc_'.$ss] == "on" || $_POST['ckm_'.$ss] == "on"){
	$permisosXOpcionXGrupoUsuarioDAO->save($permisosXOpcionXGrupoUsuario);
}
}

header("Location: ../../gruposUsuario/lista.php?ok");
exit;
?>
