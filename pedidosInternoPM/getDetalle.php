<?php
include '../php/dao/detallepedidoDAO.php';
include '../php/entities/detallepedido.php';
include '../php/dao/daoConnection.php';
include '../php/dao/VariedadesDAO.php';
include '../php/entities/Variedades.php';

$id = $_POST['id'];
$IDestado = $_POST['estado'];
$v = new VariedadesDAO();
$d = new detallepedidoDAO();
$list = $d->getsbybuscar('IDpedido','exacta',$id);
//print_r($list);
$tabla = "<form method='GET' action='../php/action/aprobarPedido.php' onsubmit='return unforgiven()'>";
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
            <td><input type='checkbox' id='check_".$countah."' name='check_".$item->getId()."' onclick='doTheCheck(".$countah.")' ></td>
            <td>".substr($item->getFechaEntrega(),0,10)."</td>
            <td>".substr($item->getFecharecibomaterial(),0,10)."</td>
            <td>".$v->getById($item->getVariedad())->getNombre()."</td>
            <td>".$item->getCantidad()." 
               <input type='hidden' value='".$item->getCantidad()."' id='cantidad".$countah."' /> 
            </td>
            <td><input class='green' readonly type='text' size='10' id='cantidad_".$countah."' name='new_value".$item->getId()."' value='".$item->getCantidadAprobada()."'/></td>
          </tr>";
endforeach;
$tabla.= "<tr>
            <td colspan='6' align='center'> 
               <input class='btn btn-grey' type='submit' value='Aprobar' />
               <input type='hidden' value='".$id."' name='IDpedido' />
               <input type='hidden' name='aprobadoParcial' />
               <input type='hidden' name='countah' value='".$countah."' id='countah'/>
               <input type='hidden' name='IDestado' value='".$IDestado."' />
            </td>
         </tr>";
$tabla.= "</table>";
$tabla.= "</form>";

echo $tabla;
?>