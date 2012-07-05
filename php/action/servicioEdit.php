<?php session_start();

include '../dao/daoConnection.php';
include '../dao/serviciosDAO.php';
include '../entities/servicios.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../Servicios/ServiciosEdit.php";

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($id == "" || $codigo == "" || $nombre==""){
    header($location."?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}


$servicio = new servicios();
$servicio2 = new servicios();
$serviciosDAO = new serviciosDAO();
$servicio = $serviciosDAO->getById($id);

$servicio2 = $serviciosDAO->getByCodigo($codigo);

if ($servicio2 != null) {
    if($servicio2->getId() != $id){
    header($location . "?id=$id&n=$nombre&d=$descripcion&er2");
    exit;
    }
}

    
    $servicio->setCodigo($codigo);
    $servicio->setNombre($nombre);
    $servicio->setDescripcion($descripcion);
    $servicio->setHabilitado(1);

    $serviciosDAO->update($servicio);
    $location = "Location: ../../Servicios/ServiciosList.php";
    header($location . '?ok');
    exit;


?>