<?php

/**
 * Description of bancoAdd
 *
 * @author Oscar David Flórez Hernández
 * 
 */
session_start();

/* if (!isset($_SESSION['admin'])) {
  echo "3";
  exit;
  } */

include '../dao/daoConnection.php';
include '../dao/blancosbiologicosDAO.php';
include '../entities/blancosbiologicos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$blancosbiologicosDAO = new blancosbiologicosDAO();
$blancosbiologicos = new blancosbiologicos;

if($codigo == "" || $nombre == "" || $_FILES['imagen'][ 'name' ] == ""){
   header("Location: ../../blancosbiologicos/blancobiologico_crear.php?c=$codigo&n=$nombre&d=$descripcion&er1");
   exit;
}

if($blancosbiologicosDAO->getByCodigo($codigo) != NULL){
   header("Location: ../../blancosbiologicos/blancobiologico_crear.php?c=$codigo&n=$nombre&d=$descripcion&er2");
   exit;
}

$blancosbiologicos->setCodigo($codigo);
$blancosbiologicos->setNombre($nombre);
$blancosbiologicos->setDescripcion($descripcion);

if ($habilitado == "on"){
$blancosbiologicos->setHabilitado(1);
}else{
$blancosbiologicos->setHabilitado(0);
}

if ($_FILES['imagen'][ 'name' ] != "") {
	$destino="../../blancosbiologicos/img/".$_FILES['imagen'][ 'name' ];
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $blancosbiologicos->setFoto($_FILES['imagen'][ 'name' ]);
}

$blancosbiologicosDAO->save($blancosbiologicos);
header("Location: ../../blancosbiologicos/lista.php?ok");
exit;
?>
