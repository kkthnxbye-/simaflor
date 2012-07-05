<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

include '../dao/daoConnection.php';
include '../dao/areaspmxbloquepmDAO.php';
include '../entities/areaspmxbloquepm.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$bloque = $_POST['bloque'];
$TipoDeArea = $_POST['idTipoArea'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$capacidad = $_POST['capacidad'];
$AreadeCultivo = $_POST['AreadeCultivo'];
$AreadeCamino = $_POST['AreadeCamino'];
$habilitado = $_POST['habilitado'];

if ($TipoDeArea == 0 || $codigo == "" || $nombre == "" || $capacidad == "" || $AreadeCultivo == ""
        || $AreadeCultivo == "" || $AreadeCamino == "") {
    header("Location: ../../areaspmxbloquepm/areaspmxbloquepm_crear.php?ta=$TipoDeArea&c=$codigo&n=$nombre&ca=$capacidad&acu=$AreadeCultivo&aca=$AreadeCamino&h=$habilitado&er1");
    exit;
}

if (filter_var($capacidad, FILTER_VALIDATE_INT) === false || filter_var($AreadeCultivo, FILTER_VALIDATE_INT) === false ||
        filter_var($AreadeCamino, FILTER_VALIDATE_INT) === false) {
    header("Location: ../../areaspmxbloquepm/areaspmxbloquepm_crear.php?ta=$TipoDeArea&c=$codigo&n=$nombre&ca=$capacidad&acu=$AreadeCultivo&aca=$AreadeCamino&h=$habilitado&er4");
    exit;
}

$areaspmxbloquepmDAO = new areaspmxbloquepmDAO();
if ($areaspmxbloquepmDAO->getBycodigo($codigo) != null) {
    header("Location: ../../areaspmxbloquepm/areaspmxbloquepm_crear.php?ta=$TipoDeArea&n=$nombre&ca=$capacidad&acu=$AreadeCultivo&aca=$AreadeCamino&h=$habilitado&er2");
    exit;
}


$areaspmxbloquepm = new areaspmxbloquepm;
$areaspmxbloquepm->setIdBloque($bloque);
$areaspmxbloquepm->setIdTipoArea($TipoDeArea);

$areaspmxbloquepm->setCodigo($codigo);
$areaspmxbloquepm->setNombre($nombre);
$areaspmxbloquepm->setCapacidad($capacidad);
$areaspmxbloquepm->setAreaCultivo($AreadeCultivo);
$areaspmxbloquepm->setAreaCamino($AreadeCamino);

if ($habilitado == "on") {
    $areaspmxbloquepm->setHabilitado(1);
} else {
    $areaspmxbloquepm->setHabilitado(0);
}


$areaspmxbloquepmDAO->save($areaspmxbloquepm);
header("Location: ../../areaspmxbloquepm/lista.php?ok");
exit;
?>
