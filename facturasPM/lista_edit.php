<?php
session_start();
require_once '../php/clases.php';
require_once '../php/dao/VariedadesDAO.php';
require_once '../php/entities/Variedades.php';
require_once '../php/dao/movimientosInventarioDAO.php';
require_once '../php/entities/movimientosInventarioPM.php';
require_once '../php/dao/facturasPMDAO.php';
require_once '../php/entities/facturasPM.php';
require_once '../php/dao/detalleFacturaPMDAO.php';
require_once '../php/entities/detalleFactura.php';

$id = $_POST['id'];
$idUsuario = $_POST['idUsuario'];

$productosDAO = new productosDAO();
$temporadasDAO = new temporadasDAO();
$temporadas = new temporadas();
$VariedadesDAO = new VariedadesDAO();
$Variedades = new Variedades();

$facturasPMDAO = new FacturasPMDAO();
$facturas = new FacturasPM();
$detalleFacturaDAO = new DetalleFacturaPMDAO();
$detalleFactura = new DetalleFacturaPM();

$temporadas = $temporadasDAO->gets();

$facturas = $facturasPMDAO->getByIdDocumento($id);
$detalleFactura = $detalleFacturaDAO->getByIdFacturaAll($facturas->getId());
?>


<form  id="lista_edit" onsubmit="return false;">
    <div style="margin: 7px auto auto 10px ">
        <label>Formato de pago:</label>
        <input type="text" name="formaPago" value="<?= $facturas->getFormaPago() ?>">
        <br><br>
        <label>Observaciones:</label>
        <input type="text" name="observaciones" size="70" value="<?= $facturas->getObservaciones() ?>">
        <br><br>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">

        <thead>

            <tr>
                <th>Producto</th>

                <th>Variedad</th>

                <th>Salida</th>

                <th>Cantidad Factura</th>

                <th>Excedente</th>

                <th>Fiesta</th>

                <th>Numero camas</th>

                <th>Precio unidad (USD)</th>

            </tr>

        </thead>

        <tbody>


            <?php
            $cont = 1;
            foreach ($detalleFactura as $item):
                
                ?>

                <tr class="odd gradeX">

                    <td>
                        <input type="hidden" name="idDetalle<?= $cont ?>" value="<?= $item->getId() ?>">
                        <?= $productosDAO->getById($VariedadesDAO->getById($item->getIdVariedad())->getIdProducto())->getNombre()  ?>
                        <input type="hidden" name="idProducto<?= $cont ?>" value="<?= $VariedadesDAO->getById($item->getIdVariedad())->getIdProducto() ?>">
                    </td>

                    <td>
                        <?= $VariedadesDAO->getById($item->getIdVariedad())->getNombre() ?>
                        <input type="hidden" name="idVariedad<?= $cont ?>" value="<?= $item->getIdVariedad() ?>">
                    </td>

                    <td>
                        <?= $item->getCantidadSalida() ?>
                        <input type="hidden" name="cantidadSalida<?= $cont ?>" id="cantidadSalida<?= $cont ?>" value="<?= $item->getCantidadSalida() ?>">
                    </td>

                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="cantidadFacturada<?= $cont ?>" value="<?= $item->getCantidadFacturada() ?>"
                               onchange="if(parseInt(this.value) <= parseInt($('#cantidadSalida<?= $cont ?>').val())){ exc = $('#cantidadSalida<?= $cont ?>').val()-this.value; $('#excedente<?= $cont ?>').val(exc);$('#excedenteh<?= $cont ?>').val(exc);}else{ $(function(){  msn.error().mostrar('La cantidad facturada no puede ser mayor a la cantidad de salida.');  }); }" required>
                    </td>

                    <td>
                        <input type="text" name="excedente<?= $cont ?>" id="excedente<?= $cont ?>" value="<?= $item->getCantidadSalida()-$item->getCantidadFacturada()  ?>" style="border: none;" disabled>
                        <input type="hidden" name="excedenteh<?= $cont ?>" id="excedenteh<?= $cont ?>" value="<?= $item->getCantidadSalida()-$item->getCantidadFacturada()  ?>">
                    </td>
                    <td><strong style="color: red">*</strong>
                        <select name="fiesta<?= $cont ?>">
                            
                            <?php foreach ($temporadas as $value): ?>
                            <option value="<?= $value->getId() ?>" <?php if($value->getId() == $item->getidTemporada()){echo "selected";} ?>><?= $value->getNombre() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="noCamas<?= $cont ?>" value="<?= $item->getNoCamas() ?>" required >
                    </td>
                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="precioUnidad<?= $cont ?>" value="<?= $item->getPrecioUnidadUSD() ?>" required >
                    </td>

                </tr>



                <?php
                $cont++;
            endforeach;
            ?>

        </tbody>

    </table>
    <input type="hidden" name="idFactura" value="<?= $facturas->getId() ?>">
    <input type="hidden" name="idUsuario" value="<?= $idUsuario; ?>">
    <input type="hidden" name="canTotal" value="<?= $cont - 1 ?>">

    <button type="submit" class="btn btn-grey" style="margin: 15px 8px 8px 8px" >Guardar</button>
    <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>
</form>

<script>
    
    
    $(function(){
        $(document).on('submit', '#lista_edit', function(e){
            e.preventDefault();
                            
            var data = $(this).serialize();
                            
            $.ajax({
                url:'../php/action/facturaEditar.php',
                type:'POST',
                data: data,
                success:function(resp){
                    
                    if(resp == 1){
                        $(function(){  msn.ok().mostrar('Proceso Exitoso.');  }); 
                        carga_lista_detalle_edit();
                    }if(resp == 2){
                        $(function(){  msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');  });
                    }if(resp == 3){
                        $(function(){  msn.error().mostrar('Tenga cuidado, esta digitando texto en campos numericos.');  });
                    }if(resp > 3){
                        $(function(){  msn.error().mostrar('Ha ocurrido un error inesperado, recargue la pagina y vuelva a intentarlo es posible que el sistema no halla guardado algunos cambios.');  });
                    }
                     
                }
            });
                            
            return false;
        });
    });

</script>