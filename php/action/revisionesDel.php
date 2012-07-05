<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 * 
 */
session_start();


include '../dao/daoConnection.php';
include '../dao/revisionesDAO.php';
include '../entities/revisiones.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

foreach ($_POST as $key => $value) {
    $$key = accents2HTML(QuotesToQuote($value));
}
if (empty($_SESSION['lista_revisiones'])){
$listadetalles = array();
}else{
$listadetalles = unserialize($_SESSION['lista_revisiones']);
}
$listadetalles_2 = array();
$id = $_POST['id'];
$st=1;
$st2=1;
foreach ($listadetalles as $li_det){
	if ($st != $id){
		$listadetalles_2[$st2] = $li_det;
		$st2++;
	}
	$st++;
	
}
$_SESSION['lista_revisiones'] = serialize($listadetalles_2);
echo "siDel";
?>
