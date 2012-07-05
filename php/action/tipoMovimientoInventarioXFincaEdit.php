<?php

/**
 * Description of bancoAdd
 *
 * @author Brayan Acebo
 *
 **/

session_start();

include '../dao/daoConnection.php';
include '../dao/TiposMovimientosInventarioXFincaDAO.php';
include '../entities/TiposMovimientoInventarioXFinca.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';


$EsPorDefecto = $_POST['defe'];
$IDFinca = $_POST['idFinca'];
$total = $_POST['total'];


$productosXFincaDAO = new TiposMovimientoInventarioXFincaDAO();
$productosXFincaDAO->delete($IDFinca);

for($ss=1; $ss<= $total; $ss++){
    
    $IDTipoMovimiento = $_POST['prod_'.$ss]; 
    if($IDTipoMovimiento == $EsPorDefecto){$_POST['ck_'.$ss] = "on";}

if ($_POST['ck_'.$ss] == "on"){
	
    
    if($_POST['con_'.$ss] != ""){$Consecutivo = $_POST['con_'.$ss];}else {$Consecutivo = 0;}
    $productosXFincaDAO->save($IDFinca, $IDTipoMovimiento, $EsPorDefecto, $Consecutivo);
        
        
}	

}

header("Location: ../../TiposMovimientoInventarioXFinca/lista.php?finca=$IDFinca&ok");
exit;
?>
