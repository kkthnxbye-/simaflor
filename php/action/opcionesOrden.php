<?php

/**
  Administrador del orden de visualización de las notas.

  Se lanza via AJAX desde el back-end del CMS.

  Recorre $notas que es un array que contiene los ID de cada nota
  el orden de visualización es establecido según el orden de aparación
  dentro del array. Se toma ek key como indicador de la nueva posición.

  Devuelve el nuevo trigger en un objeto JSON tomado por jQuery.

  @package: Administrador de Contenidos Imaginamos.com
  @author: brayan.acebo@imaginamos.co - Imaginamos SAS - www.imaginamos.com
  @version: 1.0
  @date: Abril de 2012
  @return: object/json


  All Rights Reserved, Imaginamos.com
 * */



include '../dao/daoConnection.php';
include '../dao/opcionesDAO.php';
include '../entities/opciones.php';

$objetoDAO = new opcionesDAO();

$notas = (isset($_POST['mod']) ? $_POST['mod'] : array());

$changed = 1;
$ok = FALSE;
$total = count($notas);


if (!empty($notas) && is_array($notas)) {

    foreach ($notas as $orden => $id) {
        
        if ($objetoDAO->changeOrden($id, $changed)) {
            $changed++;
        }
        

    }

    if ($changed == $total) {
        $ok = TRUE;
    }
}


$return = array(
    'ok' => $ok,
    'changed' => $changed
);

echo json_encode($return);
?>