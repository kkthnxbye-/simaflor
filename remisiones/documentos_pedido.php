<?php include '../includes/header.php'; ?>
<?php
$pedidosDAO = new pedidosDAO();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$estadospedidoDAO = new estadospedidoDAO();
$productosDAO = new productosDAO();
if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
}
if (!empty($_REQUEST['page_bus'])) {
    $_SESSION['page'] = "busk_sin";
}
if (!empty($_POST['campo'])) {
    $_SESSION['campo'] = $_POST['campo'];
}
if (!empty($_POST['tipo_b'])) {
    $_SESSION['tipo_b'] = $_POST['tipo_b'];
}
if (!empty($_POST['valor'])) {
    $_SESSION['valor'] = $_POST['valor'];
}

if (!empty($_REQUEST['modulo'])) {
    $_SESSION['modulo'] = $_REQUEST['modulo'];
}




if ($_SESSION['page'] != "opciones") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$pedidos = $pedidosDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);

/* * ********************************************************************* */
if (!isset($_REQUEST['pedido_id'])) {
    header("location : lista.php");
}
$id_ = $_REQUEST['pedido_id'];


$pedido_ = $pedidosDAO->getById($id_);
//echo "1";
$pedidoDocumento_ = new TiposDocumentoPedidosPMDAO();
//echo "1";
$TiposDocumentoPedidosPM_ = $pedidoDocumento_->gets('', '', '');
//echo "1";
include_once '../php/dao/UsuariosDAO.php';
$usuariosL = new usuariosDAO();
//echo "1";
$docxpedDAO = new documentosxpedidosDAO();
//echo "1";
$list = $docxpedDAO->getAll($id_);
//echo "1";
/* * ********************************************************************* */
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4>PEDIDOS</h4>

            <div class="help"><a href="" class="btn_black">

                    <div class="icon_botn"><img src="../../images/icon_help.png" width="22" height="23" /></div>

                    Ayuda</a></div>



        </div>



        <div class="portlet-content"><a name="plugin"></a>

            <div class="user_tit">
                <h2>
                    DOCUMENTOS DEL PEDIDO "<?= $pedido_->getId(); ?>"
                </h2>

            </div>

            <div class="btn_left">
                <!--                    <button class="btn btn-grey" onclick="location.href='pedidos_crear.php'">Nuevo</button>-->
            </div>
            <div class="btn_right">

            </div>

            <div class="line"></div>

            <br/>
            <script>
                function validateForm(){
                    if(document.getElementById('tipo_doc').value == 0){
                        alert('Seleccione una opcion del menu');
                        document.getElementById('tipo_doc').focus();
                        return false;
                    }
                    return true;
                }
            </script>
            <div class="user_tit">
                <form method="POST" action="../php/action/AddDocumentoXpedido.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <!--- Tipo de Documento --->
                    <h4>Tipo de documento:
                        <select name="tipo_doc" id="tipo_doc">
                            <option value="0"> Seleccione </option>
                            <? foreach ($TiposDocumentoPedidosPM_ as $item) { ?> 
                                <option value="<?= $item->getId(); ?>"><?= $item->getNombre(); ?></option>
                            <? } ?>
                        </select>
                        <!--- Archivo --->
                    </h4>
                    <h4>Documento:
                        <input type="file" name="file" required="required">
                        <input type="submit" value="Adjuntar">
                        <input type="hidden" value="<?= $id_; ?>" name="id_">
                        <input type="hidden" value="<?= $usuario->getId(); ?>" name="user_id">
                    </h4>
                </form>
            </div>



            <div style="display:inline"  style="padding-left:10px">
                <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                <!--				<a href="lista.php?page_bus=2" class="btn_editar l">
                
                                          <div class="icon_botn" style="height:25px;"><img src="../../images/icon_null.png" width="22" height="25" /></div>
                
                                    Limpiar Filtro
                
                                </a>-->
            </div>

            <div class="btn_right">



                <!--              <a href="excel.php" class="btn_editar">
                
                                <div class="icon_botn"><img src="../../images/icon_export.png" width="22" height="23" /></div>
                
                                Exportar (CSV)</a>-->

                <br/><br/>

            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $pedido) { ?>
                        <tr class="odd gradeX">
                            <td><?= $pedido->getDocumento(); ?></td>
                            <? $docName = $pedidoDocumento_->getById($pedido->getId_documento()); ?>
                            <td><?= $docName->getNombre();  ?></td>
                            <? $userName = $usuariosL->getById($pedido->getId_usuario()); ?>
                            <td><?= $userName->getNombre(); ?></td>
                            <td>
                                <a target="_blank" href="documentosXpedidos_archivos/<?= $pedido->getDocumento(); ?>" class="btn_editar">
                                    <div class="icon_botn">
                                        <img src="../images/page_white_copy.png" width="16" height="16" />
                                    </div> Descargar
                                </a>
                                <? if($pedido->getId_usuario() == $usuario->getId()){ ?>
                                <a onclick="return confirm('Esta seguro de realizar esta accion?');" 
                                   href="../php/action/DelDocumentoXpedido.php?id_=<?= $id_; ?>&id2_=<?= $pedido->getId_documentoxpedido(); ?>" class="btn_editar">
                                    <div class="icon_botn">
                                        <img src="../images/icon_close.png" width="16" height="16" />
                                    </div> Eliminar
                                </a>
                                <? } ?>

                                <!--                            <a href="" class="btn_black">
                                
                                                            <div class="icon_botn"><img src="../images/icon_sig.png" width="22" height="23" /></div> 
                                
                                                            Sig. Estado</a>-->

    <!--                            <a href="lista_adjuntar.php?pedido_id=<? //= $pedido->getId();  ?>" class="btn_editar">

                                <div class="icon_botn"><img src="../images/page_white_go.png" width="16" height="16" /></div> 

                                Adjuntar</a>-->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>








        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
