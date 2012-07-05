<?php include '../includes/header.php'; ?>
<?php
include_once '../php/dao/laboresDAO.php';
include_once '../php/entities/labores.php';
$lDao = new LaboresDAO();

if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_POST['page'];
}
if (!empty($_GET['page_bus'])) {
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
if ($_SESSION['page'] != "laboresPM") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$ls = $lDao->get($_REQUEST['campo'], $_REQUEST['tipo_b'], $_REQUEST['valor']);
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4> 

            <div class="help">
                <?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>



        <div class="portlet-content">


            <div class="user_tit">

                <form name="busqueda" action="lista.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="Codigo" <?php if ($_SESSION['campo'] == 'Codigo') { ?> selected="selected"<?php } ?>>Codigo</option>
                        <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                        <option value="Descripcion" <?php if ($_SESSION['campo'] == 'Descripcion') { ?> selected="selected"<?php } ?>>Descripci&oacute;n</option>
                    </select>
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
                    <input type="hidden" name="page" id="page" value="laboresPM" />

                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>

                    <!--				<div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                                                    <a href="lista.php?page_bus=2" class="btn_editar l">
                                                    
                                              <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>
                    
                                        Limpiar Filtro
                    
                                    </a>-->


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

                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='labor_crear.php'">Nuevo</button>

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
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Habilitado</th>
                        <th>Foto</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ls as $l) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $l->getId(); ?></td>
                            <td><?php echo $l->getCodigo(); ?></td>
                            <td><?php echo $l->getNombre(); ?></td>
                            <td><?php if ($l->getHabilitado() == 1): echo 'Si';
                    else: echo 'No';
                    endif; ?></td>
                            <td><?php
                            if ($l->getFoto() == "" or $l->getFoto() == 0):
                                echo 'Sin Foto';
                            else:
                                echo '<img src="images/' . $l->getFoto() . '" width="70" border="0" />';
                            endif;
                            ?></td>                                          
                            <td>
    <? if ($modificar != 0) { ?>
                                    <a href="labor_editar.php?id=<?php echo $l->getId(); ?>" class="btn_editar">

                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

                                        Editar</a>
    <? } ?>
                                <a onClick="return confirma(this)" href="../php/action/labor_eliminar.php?id=<?php echo $l->getId(); ?>&img=<?= $l->getFoto() ?>" class="btn_black">

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