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

if($codigo == "" || $nombre == ""){
   header("Location: ../../blancosbiologicos/blancobiologico_editar.php?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
   exit;
}

$check_ = new blancosbiologicos;

$check_ = $blancosbiologicosDAO->getByCodigo($codigo);

if ($check_ != null) {
    if ($check_->getId() != $id) {
        header("Location: ../../blancosbiologicos/blancobiologico_editar.php?id=$id&n=$nombre&d=$descripcion&er2");
        exit;
    }
}

$blancosbiologicos = $blancosbiologicosDAO->getById($id);
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
$blancosbiologicosDAO->update($blancosbiologicos);
header("Location: ../../blancosbiologicos/lista.php?ok");
exit;
?>
