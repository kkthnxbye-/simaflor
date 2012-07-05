<?php
session_start();

include '../dao/daoConnection.php';
include '../dao/configuracionxvariedadDAO.php';
include '../entities/configuracionxvariedad.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

function add_date($givendate,$day,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y/m/d', mktime(date('h',$cd),
      date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
      date('d',$cd)-$day, date('Y',$cd)+$yr));
      return $newdate;
 }

$dao = new configuracionxvariedadDAO();
$getData = $dao->getsDiaValor($_GET['id']);

$fechaEntrega = $_GET['fecha'];
$valor = $getData->getValor();

$nuew = add_date($fechaEntrega,$valor);
echo $nuew;


