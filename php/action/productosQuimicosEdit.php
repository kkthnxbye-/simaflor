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
include '../dao/productosQuimicosDAO.php';
include '../entities/productosQuimicos.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';
$productosQuimicosDAO = new productosQuimicosDAO();
foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

if($codigo == "" || $nombre == "" || $_POST['unidad'] == 0){
   header("Location: ../../productosQuimicos/productosQuimicos_editar.php?id=$id&c=$codigo&n=$nombre&d=$descripcion&er1");
   exit;
}

$check_ = new productosQuimicos();

$check_ = $productosQuimicosDAO->getByCode($codigo);

if($productosQuimicosDAO->getByCode($codigo) != NULL){
   if($check_->getId() != $codigo){
   header("Location: ../../productosQuimicos/productosQuimicos_editar.php?id=$id&c=$codigo&n=$nombre&d=$descripcion&er2");
   exit;
   }
}


$productosQuimicos = $productosQuimicosDAO->getById($id);
$productosQuimicos->setCodigo($codigo);
$productosQuimicos->setNombre($nombre);
$productosQuimicos->setDescripcion($descripcion);
if ($_FILES['imagen'][ 'name' ] != "") {
	$destino="../../productosQuimicos/img/".$_FILES['imagen'][ 'name' ];
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);
    $productosQuimicos->setFoto($_FILES['imagen'][ 'name' ]);
}
$productosQuimicos->setUnidad($unidad);
$productosQuimicos->setHabilitado(1);
$productosQuimicosDAO->update($productosQuimicos);
header("Location: ../../productosQuimicos/lista.php?ok");
exit;
?>
