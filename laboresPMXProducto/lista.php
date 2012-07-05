<?php include '../includes/header.php'; ?>
<?php
$laboresPMXProductoDAO = new laboresPMXProductoDAO();
$productosDAO = new productosDAO();
$laboresPMDAO = new laboresPMDAO();
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
if (!empty($_REQUEST['producto'])) {
    $_SESSION['producto'] = $_REQUEST['producto'];
}

$_SESSION['page'] = "laboresPMXProducto";
if ($_SESSION['page'] != "laboresPMXProducto") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$pro_single = $productosDAO->getById($_SESSION['producto']);

if (empty($_SESSION['producto'])) {
    $laboresPMXProducto = $laboresPMXProductoDAO->getsbybuscar2($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
} else {
    $laboresPMXProducto = $laboresPMXProductoDAO->getsbybuscar($_SESSION['producto'], $_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
}
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4>Administracion / Productos y servicios / Labores por producto / <?= $pro_single->getNombre() ?> </h4>

            <div class="help">
<?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 

                <a href="lista_.php" class="btn_black">  
                    &nbsp;&nbsp;Atras
                </a>

            </div>



        </div>



        <!--			<div class="portlet-content"><a name="plugin"></a>
        
                                        
        
                        <div class="btn_left">
                           <button class="btn btn-grey" onclick="location.href='lab_crear.php'">Nueva</button>
                           <button class="btn btn-grey" onclick="location.href='../productos/lista.php'">Volver</button>
                        </div>
                             
                         <div class="btn_right">
        
                                        </div>
        
                        <div class="line"></div>-->

        <br/>
        <!--				<div class="user_tit">
                                        <form onSubmit="return valida_cod()" name="busqueda" action="lista.php" id="busqueda" method="post">
                                        Campo <select name="campo" id="campo">
                                        <option value="todos" <?php //if ($_SESSION['campo'] == 'todos'){ ?> selected="selected"<?php //} ?>>Todos</option>
                                        <option value="Cantidad" <?php //if ($_SESSION['campo'] == 'Cantidad'){ ?> selected="selected"<?php //} ?>>Cantidad</option>
                                        <option value="TiempoCumplimiento" <?php //if ($_SESSION['campo'] == 'TiempoCumplimiento'){ ?> selected="selected"<?php //} ?>>Tiempo Cumplimiento</option>
                                        <option value="Observaciones" <?php //if ($_SESSION['campo'] == 'Observaciones'){ ?> selected="selected"<?php //} ?>>Observaciones</option>
                                        </select>
                                        <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                                        Valor
                                        <input type="text" name="valor" id="valor"  value="<?php //echo $_SESSION['valor'] ?>"/>
                                        <input type="hidden" name="page" id="page" value="laboresPMXProducto" />
        
                                        <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                                        </form>
                                        </div>-->



        <!--                <div style="display:inline"  style="padding-left:10px">
                                        <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                                        <a href="lista.php?page_bus=2" class="btn_editar l">
        
                                  <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>
        
                            Limpiar Filtro
        
                        </a>
                                        </div>-->

        <div class="btn_right">

            <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='lab_crear.php'">Nueva</button>

            <a href="excel.php" class="btn_editar">

                <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div>

                Exportar (CSV)</a>


            <br/><br/>

        </div>

   
        
        <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example" style="width: 95%">
            <thead>
                <tr>

                    <th>LaborPM</th>
                    <th>Cantidad</th>
                    <th>Tiempo Cumplimiento</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($laboresPMXProducto as $lab) { ?>
                    <tr class="odd gradeX">

                        <td><?php echo $laboresPMDAO->getById($lab->getIdLaborPM())->getNombre() ?></td>
                        <td><?php echo $lab->getCantidad() ?></td>
                        <td><?php echo $lab->getTiempoCumplimiento() ?></td>

                        <td><a href="lab_editar.php?id=<?php echo $lab->getId(); ?>" class="btn_editar">

                                <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                                Editar</a>

                            <a onClick="return confirma(this)" href="../php/action/laboresPMXProductoDel.php?id=<?php echo $lab->getId(); ?>" class="btn_black">

                                <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div>

                                Eliminar</a>
                        </td>
                    </tr>
<?php } ?>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

<?php include '../includes/footer.php'; ?>	