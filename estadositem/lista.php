<?php include '../includes/header.php'; ?>
<?php
$estadositemDAO = new estadositemDAO();


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

if ($_SESSION['page'] != "estadositem") {
    $_SESSION['campo'] = "Nombre";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}



$estadositem = $estadositemDAO->getsbybuscar($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
?>

<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?></h4> 

            <div class="help">
<?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>



        <div class="portlet-content">



            <div class="user_tit">
                <form name="busqueda" action="lista.php" id="busqueda" method="post">
                    Campo: Nombre
                    <input type="hidden" name="campo" id="campo" value="Nombre" />
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
                    <input type="hidden" name="page" id="page" value="estadositem" />

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

<button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='estadoitem_crear.php'">Nuevo</button>

                <a href="excel.php" class="btn_editar">

                    

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div> 

                    Exportar (CSV)</a>
                &nbsp;&nbsp;



                <br/><br/>

            </div>	

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach ($estadositem as $estadoitem) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $estadoitem->getId(); ?></td>
                            <td><?php echo $estadoitem->getNombre() ?></td>
                            <td>
    <? if ($modificar == 1) { ?>
                                    <a href="estadoitem_editar.php?id=<?php echo $estadoitem->getId() ?>"class="btn_editar">

                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

                                        Editar</a>
    <? } ?>
                                <a onClick="return confirma(this)" href="../php/action/estadoitem_eliminar.php?id=<?php echo $estadoitem->getId(); ?>"class="btn_black">

                                    <div class="icon_botn"><img src="../images/icon_close.png" width="22" height="23" /></div> 

                                    Eliminar</a></td>
                        </tr>
<?php } ?>
                </tbody>
            </table>

        </div>
    </div>



</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>	