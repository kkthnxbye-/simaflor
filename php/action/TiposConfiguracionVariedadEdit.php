<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposConfiguracionVariedadDAO.php';
include '../entities/TiposConfiguracionVariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadEdit.php";

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}


$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

$TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
$TiposConfiguracionVariedad2 = new TiposConfiguracionVariedad();
$TiposConfiguracionVariedadDAO = new TiposConfiguracionVariedadDAO();

$TiposConfiguracionVariedad2 = $TiposConfiguracionVariedadDAO->getBycodigo($codigo);

if ($TiposConfiguracionVariedad2 != null){
    
    if($TiposConfiguracionVariedad2->getId() !=  $id){
        
	header($location . "?id=$id&er2");
        exit;}
        
}
        
$TiposConfiguracionVariedad = $TiposConfiguracionVariedadDAO->getById($id);
// Valida los no nulos.
if($codigo != '' || $nombre != '') {
    
    $TiposConfiguracionVariedad->setCodigo($codigo);
    $TiposConfiguracionVariedad->setNombre($nombre);
    $TiposConfiguracionVariedad->setDescripcion($descripcion);
    $TiposConfiguracionVariedad->setHabilitado(1);

    $TiposConfiguracionVariedadDAO->update($TiposConfiguracionVariedad);
    
}else{
       
header($location . "?id=$id&er1");
exit;

}
$location = "Location: ../../TiposConfiguracionVariedad/TiposConfiguracionVariedadList.php";
header($location . '?ok');
exit;
?>