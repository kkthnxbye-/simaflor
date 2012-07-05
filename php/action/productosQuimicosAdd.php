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

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$productosQuimicosDAO = new productosQuimicosDAO();
$productosQuimicos = new productosQuimicos;


if($codigo == "" || $nombre == "" || $_FILES['imagen']['name'] == "" || $_POST['unidad'] == 0){
   header("Location: ../../productosQuimicos/productosQuimicos_crear.php?c=$codigo&n=$nombre&d=$descripcion&er1");
   exit;
}

if($productosQuimicosDAO->getByCode($codigo) != NULL){
   header("Location: ../../productosQuimicos/productosQuimicos_crear.php?c=$codigo&n=$nombre&d=$descripcion&er2");
   exit;
}



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
$productosQuimicosDAO->save($productosQuimicos);
header("Location: ../../productosQuimicos/lista.php?ok");
exit;
?>
