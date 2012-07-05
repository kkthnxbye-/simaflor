<?php include '../includes/header.php'; ?>
<?php
$modulosDAO = new modulosDAO();

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


if ($_SESSION['page'] != "modulos") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$modulos = $modulosDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4>Administrador / Modulos</h4>

            <div class="help"><a href="" class="btn_black">

                    <div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>

                    Ayuda</a></div>



        </div>



        <div class="portlet-content">

            <br/>
            <div class="user_tit">
                <form name="busqueda" action="lista.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                    </select>
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
                    <input type="hidden" name="page" id="page" value="modulos" />

                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                </form>
            </div>

           
            <div class="btn_right">



                <a href="excel.php" class="btn_editar">

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div>

                    Exportar (CSV)
                </a>
                <a href="lista.php?page_bus=2" class="btn_editar l">

                    <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

                </a>
                <button class="btn btn-grey" onclick="location.href='modulos_crear.php'">Nueva</button>

                <br/><br/>

            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>

                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach ($modulos as $modulo) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $modulo->getId(); ?></td>
                            <td><?php echo $modulo->getNombre() ?></td>

                            <td>

                                <a href="../configuracionxmodulo/lista.php?modulo=<?php echo $modulo->getId(); ?>" class="btn_editar">

                                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                                    Configuraci&oacute;n</a>

                                <a href="../opciones/lista.php?modulo=<?php echo $modulo->getId(); ?>" class="btn_editar">

                                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                                    Opciones</a>

    <? if ($modificar == 1) { ?>
                                    <a href="modulos_editar.php?id=<?php echo $modulo->getId(); ?>" class="btn_editar">

                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                                        Editar</a>
    <? } ?>

                                <a onClick="return confirma(this)" href="../php/action/modulosDel.php?id=<?php echo $modulo->getId(); ?>" class="btn_black">

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