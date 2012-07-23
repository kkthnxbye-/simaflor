<?php
session_start();
include '../dao/daoConnection.php';

include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

$id = $_POST['id'];
if (empty($_SESSION['detalle_remision'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['detalle_remision']);
}

$listadetalles_2 = array();
$st=0;
$st2=0;
foreach ($listadetalles as $li_det){
	if ($st != $id){
		$listadetalles_2[$st2] = $li_det;
		$st2++;
	}
	$st++;
	
}
$_SESSION['detalle_remision'] = serialize($listadetalles_2);