<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionVariedadDAO.php';
include '../entities/TiposConfiguracionVariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';



$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadAdd.php";

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

// Valida los no nulos.
if($codigo != '' || $nombre != '') {
    $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
    $TiposConfiguracionVariedadDAO = new TiposConfiguracionVariedadDAO();
	if ($TiposConfiguracionVariedadDAO->getBycodigo($codigo) != null){
	header($location . "?n=$nombre&d=$descripcion&er2");
        exit;
	}
    $TiposConfiguracionVariedad->setCodigo($codigo);
    $TiposConfiguracionVariedad->setNombre($nombre);
    $TiposConfiguracionVariedad->setDescripcion($descripcion);
    $TiposConfiguracionVariedad->setHabilitado(1);

    $TiposConfiguracionVariedadDAO->save($TiposConfiguracionVariedad);
}else{
       
header($location . "?c=$codigo&n=$nombre&=$descripcion&er1");
exit; 
}
$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadList.php";
header($location . '?ok');
exit;
?>
