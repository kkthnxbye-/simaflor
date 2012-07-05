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

$causasnacionalDAO = new causasnacionalDAO();

$id_ = $_POST['id'];
$codigo_ = accents2HTML($_POST['codigo']);
$nombre_ = accents2HTML($_POST['nombre']);
$descripcion_ = accents2HTML($_POST['descripcion']);
if(isset($_POST['habilitado'])){
   $habilitado = 1;
}else{
   $habilitado = 0;
}

if($codigo_ == "" || $descripcion_ == ""){
   header("Location: ../../causasnacional/causasnacional_editar.php?id=$id_&er1");
   exit;
}

$check_ = new causasnacional();

$check_ = $causasnacionalDAO->getByCodigo($codigo);

if ($check_ != null) {
    if ($check_->getId() != $id_) {
        header("Location: ../../causasnacional/causasnacional_editar.php?id=$id_&n=$nombre_&d=$descripcion_&h=$habilitado&er2");
        exit;
    }
}


$causasnacional = $causasnacionalDAO->getById($id_);
$causasnacional->setCodigo($codigo_);
$causasnacional->setNombre($nombre_);
$causasnacional->setDescripcion($descripcion_);

if ($habilitado == "on"){
$causasnacional->setHabilitado(1);
}else{
$causasnacional->setHabilitado(0);
}

$causasnacionalDAO->update($causasnacional);
header("Location: ../../causasnacional/lista.php?ok");
exit;
?>
