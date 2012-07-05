<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/bloquespmxfincaDAO.php';
include '../entities/bloquespmxfinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$ancho = $_POST['ancho'];
$largo = $_POST['largo'];
$area = $_POST['area'];
$habilitado = $_POST['habilitado'];


if($codigo == "" || $nombre == "" || $ancho == "" || $largo == "" || $area == "") {
    header("Location: ../../bloquesyareas/bloquespmxfinca_editar.php?id=$id&er1");
    exit;
}

if(filter_var($ancho, FILTER_VALIDATE_INT) === false || filter_var($largo, FILTER_VALIDATE_INT) === false ||
filter_var($area, FILTER_VALIDATE_INT) === false){
    header("Location: ../../bloquesyareas/bloquespmxfinca_editar.php?id=$id&er4");
    exit;
}

$bloquespmxfincaDAO = new bloquespmxfincaDAO();
$bloquespmxfinca = new bloquespmxfinca();
$bloquespmxfinca2 = new bloquespmxfinca();

$bloquespmxfinca2 = $bloquespmxfincaDAO->getByCodigo($codigo);

if ($bloquespmxfinca2 != null) {
    if($bloquespmxfinca2->getId() != $id){
    header("Location: ../../bloquesyareas/bloquespmxfinca_editar.php?id=$id&er2");
    exit;
    }
}


$bloquespmxfinca = $bloquespmxfincaDAO->getById($id);
$bloquespmxfinca->setId($id);
$bloquespmxfinca->setCodigo($codigo);
$bloquespmxfinca->setNombre($nombre);
$bloquespmxfinca->setAncho($ancho);
$bloquespmxfinca->setLargo($largo);
$bloquespmxfinca->setArea($area);

if ($habilitado == "on") {
    $bloquespmxfinca->setHabilitado(1);
} else {
    $bloquespmxfinca->setHabilitado(0);
}

$bloquespmxfincaDAO->update($bloquespmxfinca);
header("Location: ../../bloquesyareas/lista.php?ok");
exit;
?>
