<?php include '../includes/header.php'; ?>
<?php
$configuracionproveedoresxfincapmDAO = new configuracionproveedoresxfincapmDAO();

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
if (!empty($_REQUEST['finca'])) {
    $_SESSION['finca'] = $_REQUEST['finca'];
}
if (!empty($_POST['id_finca_cliente'])) {

    $_SESSION['id_finca_cliente'] = $_POST['id_finca_cliente'];
}


if ($_SESSION['page'] != "configuracionproveedoresxfincapm") {
    $_SESSION['campo'] = "todos";
    $_SESSION['id_finca_cliente'] = "";
    $_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'], "Hab")) {
    $_SESSION['id_finca_cliente'] = str_replace('si', '1', $_SESSION['id_finca_cliente']);
    $_SESSION['id_finca_cliente'] = str_replace('no', '0', $_SESSION['id_finca_cliente']);
}
$configuracionproveedoresxfincapmV = $configuracionproveedoresxfincapmDAO->getsbybuscar($_SESSION['finca'], $_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['id_finca_cliente']);
$empresaDAO = new empresasDAO();
$em = $empresaDAO->getById($_SESSION['finca']);
?>

<script>
	
    function cambia_busq(){
        var campo = document.getElementById('campo').value;
        if (campo.indexOf("Hab") !=  -1){
            $('#div_bus1').load("filtro.php?f_busq=1&campo="+campo);			
        }else{
            $('#div_bus1').load("filtro.php?f_busq=2&campo="+campo);
        }
    }
	
    setTimeout("cambia_busq()","1000");
</script>


<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / <?= $em->getNombre() ?></h4> 

            <div class="help">
                <a href="lista_.php" class="btn_black">  
                    &nbsp;&nbsp;Atras
                </a>
            </div>



        </div>



        <div class="portlet-content">


            <br/> 

            <div class="user_tit" id="div_bus1">

                <form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >Campo
                    <select name="campo" id="campo" onchange="cambia_busq()">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="IDProducto" <?php if ($_SESSION['campo'] == 'IDProducto') { ?> selected="selected"<?php } ?>>Producto</option>
                        <option value="IDMaterialVegetal" <?php if ($_SESSION['campo'] == 'IDMaterialVegetal') { ?> selected="selected"<?php } ?>>Material Vegetal</option>
                        <option value="IDFincaCliente" <?php if ($_SESSION['campo'] == 'IDFincaCliente') { ?> selected="selected"<?php } ?>>Cliente</option>
                        <option value="IDFincaProveedor" <?php if ($_SESSION['campo'] == 'IDFincaProveedor') { ?> selected="selected"<?php } ?>>Proveedor</option>

                    </select>				
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="id_finca_cliente" id="id_finca_cliente"  value="<?php echo $_SESSION['id_finca_cliente'] ?>"/>							
                    <input type="hidden" name="page" id="page" value="configuracionproveedoresxfincapm" />				
                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                </form>

            </div>

            <div style="display:inline"  style="padding-left:10px">
                <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                <a href="lista.php?page_bus=2" class="btn_editar l">

                    <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

                </a>
            </div>

            <div class="btn_right">


                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='configuracionproveedoresxfincapm_crear.php'">Nueva</button>
                <a href="excel.php" class="btn_editar">

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div> 

                    Exportar (CSV)
                </a>

                

                <br/><br/>



            </div>	

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Material Vegetal</th>
                        <th>Cliente</th>	
                        <th>Proveedor</th>	
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($configuracionproveedoresxfincapmV as $configuracionproveedoresxfincapm) { ?>
                        <tr class="odd gradeX">								
                            <td><?php echo $configuracionproveedoresxfincapm->getId(); ?></td>
                            <td><?php echo $configuracionproveedoresxfincapm->getIdProducto(); ?></td>
                            <td><?php echo $configuracionproveedoresxfincapm->getIdMaterialVegetal(); ?></td>							
                            <td><?php echo $configuracionproveedoresxfincapm->getFincaCliente(); ?></td>							
                            <td><?php echo $configuracionproveedoresxfincapm->getFincaProveedor(); ?></td>							

                            <td><a href="configuracionproveedoresxfincapm_editar.php?id=<?php echo $configuracionproveedoresxfincapm->getId(); ?>" class="btn_editar">

                                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

                                    Editar</a>

                                <a onClick="return confirma(this)" href="../php/action/configuracionproveedoresxfincapmDelete.php?id=<?php echo $configuracionproveedoresxfincapm->getId(); ?>" class="btn_black">

                                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                                    Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>			

        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>	