<?php

session_start();

include '../php/dao/daoConnection.php';


include '../php/dao/arqueoInventarioPMDAO.php';
include '../php/entities/arqueoInventarioPM.php';

include '../php/dao/detalleArqueoInventarioPMDAO.php';
include '../php/entities/detalleArqueoInventarioPM.php';

include '../php/dao/inventariosPMDAO.php';
include '../php/entities/inventariosPM.php';

$archivo = $_FILES['file']['name'];
$source = $_FILES['file']['tmp_name'];
$destination = 'archivos/' . $archivo;

$extension = substr(strrchr($archivo, '.'), 1);

if($extension != 'txt'){
   header('Location: carga.php?exterr=&finca='.$_SESSION['fincaCarga']);
}

$daoA = new ArqueoInventarioPMDAO();
$daoD = new detalleArqueoInventarioPMDAO();
$daoI = new InventariosPMDAO();

$fecha = date('Y-m-d');

$arqueos = $daoA->get('fecha',"'$fecha'", 'verificado', '0');

if (count($arqueos) >= 1) {
   $id_to_detail = $arqueos->getId();
} else {
   $objArqueo = new ArqueoInventarioPM();
   $objArqueo->setIdFinca($_SESSION['fincaCarga']);
   $objArqueo->setIdUsuario($_SESSION['usuarioCarga']);
   $objArqueo->setFecha(date('Y-m-d'));
   $objArqueo->setUnidadesEnInventario('NULL');
   $objArqueo->setUnidadesFueraInventario('NULL');
   $objArqueo->setVerificado(0);
   $daoA->save($objArqueo);

   $id_to_detail = $daoA->getLastId();
}

$fileData = array();
//$hiddenNumber = 0;
if (copy($source, $destination)) {
   $ar = fopen('archivos/' . $archivo, "r") or die("No se pudo abrir el archivo");
   while (!feof($ar)) {
      $linea = fgets($ar);
      $lineasalto = nl2br($linea);
      $objDetalle = new DetalleArqueoInventarioPM();
      $objDetalle->setIdArqueoInventarioPM($id_to_detail);
      $objDetalle->setIdInventarioPM($linea);
      $daoD->save($objDetalle);
      //if($linea != $hiddenNumber){
      $fileData[] = $linea;
//      $hiddenNumber = $linea;
//      }
   }
   fclose($ar);
   
   $fileData = array_unique($fileData);
//   echo '<pre>';
//   print_r($fileData);
//   echo '</pre>';
   
   $listaDetalle = $daoD->get('IdArqueoInventarioPM', $id_to_detail);
   /*
    * Valores que estan en la tabla de inventario pero no en el archivo si tienen 
    * saldo mayor a cero y la fincaProduccion es la de 
    * la session 
    */
   $in = '';

   /*
    * Valores que no estan en la tabla de inventario pero si en el archivo si tienen 
    * saldo mayor a cero y la fincaProduccion es la de 
    * la session 
    */
   $notIn = '';

   $inventarioList = $daoI->get();
   $inArray = array();
   foreach ($inventarioList as $i) {
      if ($i->getIdFincaProduccion() == $_SESSION['fincaCarga']) {
         if ($i->getSaldo() > 0) {
            foreach ($listaDetalle as $l) {
               if ($i->getId() == $l->getIdInventarioPM()) {
                  $inArray[] = $l->getIdInventarioPM();
               }
            }
         }
      }
   }

   $outArray = array();

   
      foreach ($fileData as $word1) {
         if (!(in_array($word1, $inArray))){
            $outArray[] = $word1;
         }
      }

      foreach ($inArray as $word2) {
         if (!(in_array($word2, $fileData))){
            $outArray[] = $word2;
         }
      }

   function trim_value(&$value) 
   { 
      $value = trim($value); 
   }
   
   array_walk($inArray, 'trim_value');
   array_walk($outArray, 'trim_value');
   
   $inArray = array_unique($inArray);
   $outArray = array_unique($outArray);
   
   $in = implode(',',$inArray);
   $notIn = implode(',',$outArray);
   
   
   
   $daoA->update('UnidadesEnInventario', "'$in'", 'ID',$id_to_detail);
   $daoA->update('UnidadesFueraInventario', "'$notIn'", 'ID',$id_to_detail);
   
   echo "ID's en base de datos: " . $in;
   echo '<br>';
   echo "ID's fuera de la base de datos: " . $notIn;
   echo "<br><br>
      <a href='carga.php?finca=".$_SESSION['fincaCarga']."'>Volver</a>
         &nbsp;&nbsp;&nbsp;
      <a href='index.php'>Salir</a>
         ";
   
} else {
   echo 'El archivo no se pudo descomprimir';
   exit;
}