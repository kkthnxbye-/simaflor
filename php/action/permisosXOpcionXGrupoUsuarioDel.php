<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 *
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/permisosXOpcionXGrupoUsuarioDAO.php';
include '../entities/permisosXOpcionXGrupoUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisosXOpcionXGrupoUsuarioDAO->delete($_REQUEST['id']);
header("Location: ../../permisosXOpcionXGrupoUsuario/lista.php");
exit;
?>
