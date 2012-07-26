<?php
session_start();
require_once '../php/clases.php';
require_once '../php/dao/VariedadesDAO.php';
require_once '../php/entities/Variedades.php';
require_once '../php/dao/movimientosInventarioDAO.php';
require_once '../php/entities/movimientosInventarioPM.php';

$id = $_POST['id'];
$idUsuario = $_POST['idUsuario'];

$productosDAO = new productosDAO();
$temporadasDAO = new temporadasDAO();
$temporadas = new temporadas();
$VariedadesDAO = new VariedadesDAO();
$Variedades = new Variedades();

$temporadas = $temporadasDAO->gets();

$Variedades = $VariedadesDAO->getVariedadesForFactura($id);
?>


<form  id="lista_edit" onsubmit="return false;">
    <div style="margin: 7px auto auto 10px ">
        <label>Formato de pago:</label>
        <input type="text" name="formaPago">
        <br><br>
        <label>Observaciones:</label>
        <input type="text" name="observaciones" size="70">
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
            foreach ($Variedades as $item):
                ?>

                <tr class="odd gradeX">

                    <td>
                        <?= $productosDAO->getById($item->getIdProducto())->getNombre() ?>
                        <input type="hidden" name="idProducto<?= $cont ?>" value="<?= $item->getIdProducto() ?>">
                    </td>

                    <td>
                        <?= $item->getNombre() ?>
                        <input type="hidden" name="idVariedad<?= $cont ?>" value="<?= $item->getId() ?>">
                    </td>

                    <td>
                        <?= $item->getCantidad() ?>
                        <input type="hidden" name="cantidadSalida<?= $cont ?>" id="cantidadSalida<?= $cont ?>" value="<?= $item->getCantidad() ?>">
                    </td>

                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="cantidadFacturada<?= $cont ?>" 
                               onchange="if(parseInt(this.value) <= parseInt($('#cantidadSalida<?= $cont ?>').val())){ exc = $('#cantidadSalida<?= $cont ?>').val()-this.value; $('#excedente<?= $cont ?>').val(exc);$('#excedenteh<?= $cont ?>').val(exc);}else{ $(function(){  msn.error().mostrar('La cantidad facturada no puede ser mayor a la cantidad de salida.');  }); }" required>
                    </td>

                    <td>
                        <input type="text" name="excedente<?= $cont ?>" id="excedente<?= $cont ?>" value="0" style="border: none;" disabled>
                        <input type="hidden" name="excedenteh<?= $cont ?>" id="excedenteh<?= $cont ?>">
                    </td>
                    <td><strong style="color: red">*</strong>
                        <select name="fiesta<?= $cont ?>">
                            <option value="0">Seleccione</option>
                            <?php foreach ($temporadas as $value): ?>
                                <option value="<?= $value->getId() ?>"><?= $value->getNombre() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="noCamas<?= $cont ?>" required >
                    </td>
                    <td>
                        <strong style="color: red">*</strong>
                        <input type="text" name="precioUnidad<?= $cont ?>" required >
                    </td>

                </tr>



                <?php
                $cont++;
            endforeach;
            ?>

        </tbody>

    </table>
    <input type="hidden" name="idDocumentoInventario" value="<?= $id ?>">
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
                url:'../php/action/facturaAdd.php',
                type:'POST',
                data: data,
                success:function(resp){
                    window.location='editar.php?id=<?= $id ?>&res='+resp;                                  	
                }
            });
                            
            return false;
        });
    });

</script>