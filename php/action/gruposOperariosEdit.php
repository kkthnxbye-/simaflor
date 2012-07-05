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

$id = $_POST['id'];
$nombre = accents2HTML($_POST['nombre']);
$codigo = $_POST['codigo'];
$descripcion = accents2HTML($_POST['descripcion']);

if($nombre == "" || $codigo == "") {
    header("Location: ../../gruposOperarios/gruposOperarios_editar.php?id=$id&n=$nombre&c=$codigo&d=$descripcion&er2");
    exit;
}

$gruposOperariosDAO = new gruposOperariosDAO();
$gruposOperarios = new gruposOperarios();
$gruposOperarios2 = new gruposOperarios();
$gruposOperarios2 = $gruposOperariosDAO->getByCodigo($codigo);

if ($gruposOperarios2 != null) {
    if ($gruposOperarios2->getId() != $id) {
        header("Location: ../../gruposOperarios/gruposOperarios_editar.php?id=$id&n=$nombre&d=$descripcion&er2");
        exit;
    }
}

$gruposOperarios = $gruposOperariosDAO->getById($id);
$gruposOperarios->setCodigo($codigo);
$gruposOperarios->setNombre($nombre);
$gruposOperarios->setDescripcion($descripcion);
$gruposOperariosDAO->update($gruposOperarios);

header("Location: ../../gruposOperarios/lista.php?ok");
exit;
?>
