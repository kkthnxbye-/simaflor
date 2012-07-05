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

$idGrupoUsuario = $_POST['idGrupoUsuario'];
$login = $_POST['login'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$habi = $_POST['habi'];

if ($idGrupoUsuario == 0 || $login == "" || $nombre == ""
        || $email == "" || $telefono == "") {
    header("Location: ../../Usuarios/UsuariosAdd.php?i=$idGrupoUsuario&l=$login&n=$nombre&e=$email&t=$telefono&h=$habi&er1");
    exit;
}

$UsuariosDAO = new UsuariosDAO();
$usuario = new usuarios;


if($UsuariosDAO->gets("Login", $tipob, $contrasena) != null ){
    header("Location: ../../Usuarios/UsuariosAdd.php?i=$idGrupoUsuario&n=$nombre&e=$email&t=$telefono&h=$habi&er5");
    exit;
}


$usuario->setIdGrupoUsuario($idGrupoUsuario);
$usuario->setLogin($login);
$usuario->setContrasena($contrasena);
$usuario->setNombre($nombre);
$usuario->setEmail($email);
$usuario->setTelefono($telefono);

if ($habi == "on") {
    $usuario->setHabilitado(1);
} else {
    $usuario->setHabilitado(0);
}

$UsuariosDAO->save($usuario);
header("Location: ../../Usuarios/UsuariosList.php?ok");
exit;
?>
