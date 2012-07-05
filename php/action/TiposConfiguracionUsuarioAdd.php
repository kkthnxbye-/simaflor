<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionUsuarioDAO.php';
include '../entities/TiposConfiguracionUsuario.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../TiposConfiguracionUsuario/TiposConfiguracionUsuarioAdd.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if ($codigo == "" || $nombre == "") {
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
$TiposConfiguracionUsuarioDAO = new TiposConfiguracionUsuarioDAO();

if ($TiposConfiguracionUsuarioDAO->getBycodigo($codigo) != null) {
    header($location . "?n=$nombre&d=$descripcion&er2");
    exit;
}

$TiposConfiguracionUsuario->setCodigo($codigo);
$TiposConfiguracionUsuario->setNombre($nombre);
$TiposConfiguracionUsuario->setDescripcion($descripcion);
$TiposConfiguracionUsuario->setHabilitado(1);

$TiposConfiguracionUsuarioDAO->save($TiposConfiguracionUsuario);

$location = "Location: ../../TiposConfiguracionUsuario/TiposConfiguracionUsuarioList.php";
header($location . '?ok');
exit;
?>
