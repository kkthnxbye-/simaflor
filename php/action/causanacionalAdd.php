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
include '../dao/causasnacionalDAO.php';
include '../entities/causasnacional.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}

$codigo_ =  $_POST['codigo'];
$nombre_ =  accents2HTML($_POST['nombre']);
$descripcion_ =  accents2HTML($_POST['descripcion']);



if($codigo_ == "" || $nombre_ == ""){
   header("Location: ../../causasnacional/causasnacional_crear.php?c=$codigo_&n=$nombre_&d=$descripcion_&er1");
   exit;
}


$causasnacionalDAO = new causasnacionalDAO();
$causasnacional = new causasnacional;

if ($causasnacionalDAO->getByCodigo($codigo_) != null){
	header("Location: ../../causasnacional/causasnacional_crear.php?n=$nombre_&d=$descripcion_&er2");
        exit;
}

$causasnacional->setCodigo($codigo_);
$causasnacional->setNombre($nombre_);
$causasnacional->setDescripcion($descripcion_);

if ($habilitado == "on"){
$causasnacional->setHabilitado(1);
}else{
$causasnacional->setHabilitado(0);
}

$causasnacionalDAO->save($causasnacional);
header("Location: ../../causasnacional/lista.php?ok");
exit;
?>
