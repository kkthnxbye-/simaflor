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

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario;
$permisosXOpcionXGrupoUsuario->setIdGrupoUsuario($idGrupoUsuario);
$permisosXOpcionXGrupoUsuario->setIdOpcion($idOpcion);
$permisosXOpcionXGrupoUsuario->setPermiteConsultar($permiteConsultar);
$permisosXOpcionXGrupoUsuario->setPermiteModificar($permiteModificar);
$permisosXOpcionXGrupoUsuarioDAO->save($permisosXOpcionXGrupoUsuario);
header("Location: ../../permisosXOpcionXGrupoUsuario/lista.php");
exit;
?>
