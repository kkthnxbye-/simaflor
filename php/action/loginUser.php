<?php 
session_start(); 

include '../dao/daoConnection.php';
include '../dao/UsuariosDAO.php';
include '../entities/usuarios.php';

$login = $_REQUEST['username'];
$pass = $_REQUEST['password'];


$location = "location: ../../index.php?a=1";
$si = "location: ../../index/index2.php";
if ($login == "" || $pass == "") {
    header($location . "&error1");
    exit;
}

$UsuariosDAO = new UsuariosDAO;
$usuario = $UsuariosDAO->getUserByLogin($login);

if ($usuario == null) {
    header($location . "&error2");
    exit;
}

if (($usuario->getContrasena() == $pass) && ($usuario->getLogin() == $login) && ($usuario->getHabilitado() == 1)) {
    $_SESSION['user'] = serialize($usuario);
    header($si);
    exit;
}
//everything bad!
header($location . "&error2");
exit;
?>