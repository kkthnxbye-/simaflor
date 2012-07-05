<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/gruposOperariosDAO.php';
include '../entities/gruposOperarios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if ($codigo == "" || $nombre == "") {
    header("Location: ../../gruposOperarios/gruposOperarios_crear.php?c=$codigo&n=$nombre&d=$descripcion&er2");
    exit;
}

$gruposOperariosDAO = new gruposOperariosDAO();
$gruposOperarios = new gruposOperarios();

if ($gruposOperariosDAO->getBycodigo($codigo) != null) {
    header("Location: ../../gruposOperarios/gruposOperarios_crear.php?n=$nombre&d=$descripcion&er2");
    exit;
}

$gruposOperarios->setCodigo($codigo);
$gruposOperarios->setNombre($nombre);
$gruposOperarios->setDescripcion($descripcion);
$gruposOperarios->setHabilitado(1);
$gruposOperariosDAO->save($gruposOperarios);

header("Location: ../../gruposOperarios/lista.php?ok");
exit;
?>
