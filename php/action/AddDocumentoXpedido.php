<?php

session_start();

include '../dao/daoConnection.php';
include '../dao/documentosxpedidosDAO.php';
include '../functions/text2HTML.php';
include '../functions/QuotesToQuote.php';

if ($_POST['ban'] != 1) {
    $location = "Location: ../../pedidosInternoPM/documentos_pedido.php";
} else {
    $location = "Location: ../../pedidosClientePM/documentos_pedido.php";
}

$filename = $_FILES['file']['name'];
$id_ = $_POST['id_'];
$user_id = $_POST['user_id'];
$tipo_doc = $_POST['tipo_doc'];
$fecha = date("Y-m-d");
$docxpedDAO = new documentosxpedidosDAO();
$docxpedDAO->save($tipo_doc, $id_, $user_id, '', $fecha);
$lastid = $docxpedDAO->getLastId();
//echo $lastid;

if ($filename != '') {
    $path_info = pathinfo($filename);
    $ext = $path_info['extension'];

    if ($_POST['ban'] != 1) {
        $destiny = "../../pedidosInternoPM/documentosXpedidos_archivos/$lastid.$ext";
    } else {
        $destiny = "../../pedidosClientePM/documentosXpedidos_archivos/$lastid.$ext";
    }

    
    copy($_FILES['file']['tmp_name'], $destiny);
    $documento = $lastid . '.' . $ext;
    $docxpedDAO->update($documento, $lastid);
    header($location . '?ok1&pedido_id=' . $id_ . '');
    exit;
} else {
    header($location . '?error1&pedido_id=' . $id_ . '');
    exit;
}
?>
