<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/VariedadesDAO.php';
include '../entities/Variedades.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $key = accents2HTML(QuotesToQuote($value));
}

$location = "Location: ../../Variedades/VariedadesAdd.php";

$IDProducto = $_POST['IDProducto'];
$IDBreeder = $_POST['IDBreeder'];
$IDColor = $_POST['IDColor'];
$codigo = accents2HTML($_POST['codigo']);
$nombre = accents2HTML($_POST['nombre']);
$descripcion = accents2HTML($_POST['descripcion']);
$habilitado = $_POST['habilitado'];

if($IDProducto == 0 || $IDBreeder == 0 || $IDColor == 0 || $codigo == "" || $nombre == ""){
    header($location."?p=$IDProducto&b=$IDBreeder&co=$IDColor&c=$codigo&n=$nombre&d=$descripcion&h=$habilitado&er1");
    exit;
}

$VariedadesDAO = new VariedadesDAO();
$variedades = new Variedades;
$variedades2 = new Variedades;

$variedades2 = $VariedadesDAO->getByCodigo($codigo);

if ($variedades2 != null){
     header($location."?p=$IDProducto&b=$IDBreeder&co=$IDColor&n=$nombre&d=$descripcion&h=$habilitado&er2");
     exit;
}


$variedades->setId($VariedadesDAO->getLastId()+1);
$variedades->setIdProducto($IDProducto);
$variedades->setIdBreeder($IDBreeder);
$variedades->setIdColor($IDColor);
$variedades->setCodigo($codigo);
$variedades->setNombre($nombre);
$variedades->setDescripcion($descripcion);

if ($habilitado == "on"){
$variedades->setHabilitado(1);
}else{
$variedades->setHabilitado(0);
}

if ($_FILES['imagen'][ 'name' ] != "") {
    $img = $variedades->getId()."_".$_FILES['imagen'][ 'name' ];
	$destino="../../Variedades/img/".$img;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $variedades->setFoto($img);
}else{
     header($location."?p=$IDProducto&b=$IDBreeder&co=$IDColor&c=$codigo&n=$nombre&d=$descripcion&h=$habilitado&er1");
    exit;
}

$VariedadesDAO->save($variedades);
header("Location: ../../Variedades/VariedadesList.php?ok");
exit;
?>
