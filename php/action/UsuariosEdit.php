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

$id = $_POST['id'];
$idGrupoUsuario = $_POST['idGrupoUsuario'];
$login = $_POST['login'];
$contrasena = $_POST['contrasena'];
$nombre = accents2HTML($_POST['nombre']);
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$habi = $_POST['habi'];

if ($idGrupoUsuario == 0 || $login == "" || $nombre == "" || $email == "" || $telefono == "") {
    header("Location: ../../Usuarios/UsuariosEdit.php?id=$id&er1");
    exit;
}

$UsuariosDAO = new UsuariosDAO();
$usuario = $UsuariosDAO->getById($id);
$usuario->setIdGrupoUsuario($idGrupoUsuario);
$usuario->setLogin($login);
if ($contrasena != "") {
    $usuario->setContrasena($contrasena);
}
$usuario->setNombre($nombre);
$usuario->setEmail($email);
$usuario->setTelefono($telefono);


if ($habi == "on") {
    $usuario->setHabilitado(1);
} else {
    $usuario->setHabilitado(0);
}

$UsuariosDAO->update($usuario);
header("Location: ../../Usuarios/UsuariosList.php?ok");
exit;
?>
