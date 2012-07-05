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

$bloquespmxfincaDAO = new bloquespmxfincaDAO();
$bloquespmxfinca = new bloquespmxfinca;


$idfinca = $_POST['idfinca'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$ancho = $_POST['ancho'];
$largo = $_POST['largo'];
$area = $_POST['area'];
$habilitado = $_POST['habilitado'];




if ($idfinca == "" || $codigo == "" || $nombre == "" || $ancho == "" || $largo == "" || $area == "") {
    header("Location: ../../bloquesyareas/bloquespmxfinca_crear.php?c=$codigo&n=$nombre&a=$ancho&l=$largo&ar=$area&h=$habilitado&er1");
    exit;
}

if(filter_var($ancho, FILTER_VALIDATE_INT) === false || filter_var($largo, FILTER_VALIDATE_INT) === false || filter_var($area, FILTER_VALIDATE_INT) === false){  
    header("Location: ../../bloquesyareas/bloquespmxfinca_crear.php?c=$codigo&n=$nombre&a=$ancho&l=$largo&ar=$area&h=$habilitado&er4");
    exit;
}

if ($bloquespmxfincaDAO->getBycodigo($codigo) != null) {
    header("Location: ../../bloquesyareas/bloquespmxfinca_crear.php?n=$nombre&a=$ancho&l=$largo&ar=$area&h=$habilitado&er2");
    exit;
}


$bloquespmxfinca->setIdFinca($idfinca);
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

$bloquespmxfincaDAO->save($bloquespmxfinca);


header("Location: ../../bloquesyareas/lista.php?ok");
exit;
?>
