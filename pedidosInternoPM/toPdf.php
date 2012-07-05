<?php

require('fpdf.php');

include '../php/dao/detallepedidoDAO.php';
include '../php/entities/detallepedido.php';

include '../php/dao/pedidosDAO.php';
include '../php/entities/pedidos.php';

include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

include '../php/dao/empresasDAO.php';
include '../php/entities/empresas.php';

include '../php/dao/materialesVegetalesDAO.php';
include '../php/entities/materialesVegetales.php';

include '../php/dao/productosDAO.php';
include '../php/entities/productos.php';

include '../php/dao/estadospedidoDAO.php';
include '../php/entities/estadospedido.php';

include '../php/dao/serviciosDAO.php';
include '../php/entities/servicios.php';

include '../php/dao/daoConnection.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

$id = $_GET['pedido_id'];

$p = new pedidosDAO();
$plist = $p->getById($id);

$d = new detallepedidoDAO();
$dlist = $d->getsbybuscar("IDPedido","exacta",$id);

$v = new VariedadesDAO();

$e = new empresasDAO();

$m = new materialesVegetalesDAO();

$pr = new productosDAO();

$es = new estadospedidoDAO();

$s = new serviciosDAO();

$pdf->Cell(70,6,"Documento de compra");
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(30,6,"Pedido No",1);
$pdf->Ln();
$pdf->Cell(30,6,$id,1);
$pdf->Ln();
$pdf->Cell(30,6,"Proveedor",1);
$pdf->Cell(30,6,"Cliente",1);
$pdf->Cell(30,6,"M. Vegetal",1);
$pdf->Cell(30,6,"Producto",1);
$pdf->Cell(40,6,"Estado",1);
$pdf->Cell(30,6,"Servicio",1);
$pdf->Ln();
$pdf->Cell(30,6,$e->getById($plist->getFincaproveedor())->getNombre(),1);
$pdf->Cell(30,6,$e->getById($plist->getFincacliente())->getNombre(),1);
$pdf->Cell(30,6,$m->getById($plist->getMaterialvegetal())->getNombre(),1);
$pdf->Cell(30,6,$pr->getById($plist->getProducto())->getNombre(),1);
$pdf->Cell(40,6,$es->getById($plist->getEstadopedido())->getNombre(),1);
$pdf->Cell(30,6,$s->getById($plist->getServicio())->getNombre(),1);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(70,6,"Detalle del pedido");
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(40,6,"Fecha Entrega",1);
$pdf->Cell(40,6,"Fecha Recibido",1);
$pdf->Cell(30,6,"Variedad",1);
$pdf->Cell(30,6,"Cantidad",1);
$pdf->Ln();
foreach($dlist as $l):
$f1 = explode(" ",$l->getFechaEntrega());
$f2 = explode(" ",$l->getFecharecibomaterial());
$pdf->Cell(40,6,$f1[0],1);
$pdf->Cell(40,6,$f2[0],1);
$pdf->Cell(30,6,$v->getById($l->getVariedad())->getNombre(),1);
$pdf->Cell(30,6,$l->getCantidad(),1);
$pdf->Ln();   
endforeach;
$pdf->Output();
?>