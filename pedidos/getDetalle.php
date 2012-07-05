<?php
include '../php/dao/detallepedidoDAO.php';
include '../php/entities/detallepedido.php';
include '../php/dao/daoConnection.php';

$id = $_POST['id'];

$d = new detallepedidoDAO();
$list = $d->getsbybuscar('IDpedido','exacta',$id);
//print_r($list);
$tabla = "<form method='GET' action='../php/action/changePedidoEstado.php' onsubmit='return unforgiven()'>";
$tabla.= "<table>";
$tabla.= "<tr>
            <th>&nbsp;</th>
            <th>Fecha Entrega</th>
            <th>Fecha Recibido</th>
            <th>Variedad</th>
            <th>Cantidad</th>
            <th>Cantidad Aprobada</th>
          </tr>";
$countah=0;
foreach ($list as $item):
$countah++;
$tabla.= "<tr>
            <td><input type='checkbox' name='c".$item->getId()."'></td>
            <td>".substr($item->getFechaEntrega(),0,10)."</td>
            <td>".substr($item->getFecharecibomaterial(),0,10)."</td>
            <td>".$item->getVariedad()."</td>
            <td>".$item->getCantidad()." 
               <input type='hidden' value='".$item->getCantidad()."' id='cantidad".$countah."' /> 
            </td>
            <td><input type='text' size='10' id='cantidad_".$countah."' name='new_value".$item->getId()."' value='".$item->getCantidadAprobada()."'/></td>
          </tr>";
endforeach;
$tabla.= "<tr>
            <td colspan='6' align='center'> 
               <input type='submit' value='Aprobar' />
               <input type='hidden' value='".$id."' name='IDpedido' />
               <input type='hidden' name='aprobadoParcial' />
               <input type='hidden' name='countah' value='".$countah."' id='countah'/>
            </td>
         </tr>";
$tabla.= "</table>";
$tabla.= "</form>";

echo $tabla;
?>