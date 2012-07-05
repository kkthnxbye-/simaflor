<?php session_start();

include '../dao/daoConnection.php';
include '../dao/procesosDAO.php';
include '../entities/procesos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../procesos/procesos_crear.php";

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
    header($location . "?c=$codigo&n=$nombre&d=$descripcion&er1");
    exit;
}

$procesosDAO = new procesosDAO();
$procesos = new procesos;

if ($procesosDAO->getBycodigo($codigo) != null){
	header($location . "?n=$nombre&d=$descripcion&er2");
        exit;
}

$procesos->setCodigo($codigo);
$procesos->setNombre($nombre);
$procesos->setDescripcion($descripcion);
$procesos->setHabilitado(1);
$procesosDAO->save($procesos);
header("Location: ../../procesos/lista.php?ok");
exit;
?>
