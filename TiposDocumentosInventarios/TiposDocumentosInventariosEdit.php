<?php include '../includes/header.php'; ?>
<?php
$TiposDocumentoXTipoMovimientoInventarioDAO = new TiposDocumentoXTipoMovimientoInventarioDAO();
$TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
$TiposDocumentoXTipoMovimientoInventario = $TiposDocumentoXTipoMovimientoInventarioDAO->getById($_REQUEST['id']);

$tiposDocumento = new TiposDocumento();
$tiposDocumentoDAO = new TiposDocumentoDAO();
$tiposDocumentos = $tiposDocumentoDAO->gets('','','');
$total = $tiposDocumentoDAO->total('','','');

$tiposMovimientoInventarioDAO = new TiposMovimientoInventarioDAO();
$tiposMovimiento = new TiposMovimientoInventario();
$tiposMovimientos = $tiposMovimientoInventarioDAO->gets('', '', '');
$total2 = $tiposMovimientoInventarioDAO->total('', '', '');
?>
<div id="content" class="xfluid">
    <div class="portlet x9">
        <div class="portlet-header"><h4>Editar TiposDocumentoXTipoMovimientoInventario</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposDocumentosInventariosEdit.php" method="post" class="form label-inline">
                <div class="field">
                    <label for="fname" width=" 35%">Documento</label>
                    <select name="tipoDocumento" id="tipoDocumento">
                        <?php if ($total > 0):?>
                        <?php foreach ($tiposDocumentos as $tiposDocumento) : ?>
                        <option value="<?= $tiposDocumento->getId() ?>" <?php if($tiposDocumento->getId() == $TiposDocumentoXTipoMovimientoInventario->getTipoDocumento()):?>selected<?php endif;?>><?= $tiposDocumento->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                 <div class="field">
                    <label for="fname" width="50%">Inventario</label>
                    <select name="tipoMovimientoInventario" id="tipoMovimientoInventario">
                        <?php if ($total2 > 0):?>
                        <?php foreach ($tiposMovimientos as $tiposMovimiento) : ?>
                        <option value="<?= $tiposMovimiento->getId() ?>" <?php if($tiposMovimiento->getId() == $TiposDocumentoXTipoMovimientoInventario->getTipoMovimientoInventario()):?>selected<?php endif;?>><?= $tiposMovimiento->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?> 
                    </select>
                </div>
                <br />
                <div class="buttonrow">
                    <input type="hidden" id="id" name="id" value="<?=$TiposDocumentoXTipoMovimientoInventario->getId()?>" />
                    <button class="btn btn-grey">Agregar TiposDocumentoXTipoMovimientoInventario</button>
                    <a href="TiposDocumentosInventariosList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>

</div>
<?php include '../includes/footer.php'; ?>