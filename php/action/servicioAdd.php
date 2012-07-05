<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/serviciosDAO.php';
include '../entities/servicios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../Servicios/ServiciosAdd.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == '' || $nombre == '') {
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$servicio = new servicios();
$serviciosDAO = new serviciosDAO();


if ($serviciosDAO->getByCodigo($codigo) != null) {
    header($location . "?n=$nombre&d=$descripcion&er2");
    exit;
}

    
    $servicio->setCodigo($codigo);
    $servicio->setNombre($nombre);
    $servicio->setDescripcion($descripcion);
    $servicio->setHabilitado(1);

    $serviciosDAO->save($servicio);


$location = "Location: ../../Servicios/ServiciosList.php";
header($location . '?ok');
exit;

?>
