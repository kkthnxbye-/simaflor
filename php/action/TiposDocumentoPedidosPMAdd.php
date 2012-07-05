<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposDocumentoPedidosPMDAO.php';
include '../entities/TiposDocumentoPedidosPM.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMAdd.php";

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$codigo = $_POST['codigo'];
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);

if($codigo == "" || $nombre == ""){
     header($location."?c=$codigo&n=$nombre&d=$descripcion&er1");
	exit;
}

// Valida los no nulos.

    $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
    $TiposDocumentoPedidosPMDAO = new TiposDocumentoPedidosPMDAO();
	if ($TiposDocumentoPedidosPMDAO->getBycodigo($codigo) != null){
            header($location."?n=$nombre&d=$descripcion&er2");
	exit;
	} 
    $TiposDocumentoPedidosPM->setCodigo($codigo);
    $TiposDocumentoPedidosPM->setNombre($nombre);
    $TiposDocumentoPedidosPM->setDescripcion($descripcion);
    $TiposDocumentoPedidosPM->setHabilitado(1);

    $TiposDocumentoPedidosPMDAO->save($TiposDocumentoPedidosPM);

$location = "Location: ../../TiposDocumentoPedidosPM/TiposDocumentoPedidosPMList.php";
header($location . '?ok');
exit;
?>
