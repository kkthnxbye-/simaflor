<?php
include '../includes/header.php';

$variedadesDAO = new VariedadesDAO();

if (!empty($_POST['page'])) {
    $_SESSION['page'] = $_REQUEST['page'];
}
if (isset($_GET['page_bus'])) {
    $_SESSION['page_bus'] = $_GET['page_bus'];
    unset($_SESSION['campo']);
    unset($_SESSION['valor']);
    unset($_SESSION['tipo_b']);
} else {
    unset($_SESSION['page_bus']);
}
if (!empty($_POST['campo'])) {
    $_SESSION['campo'] = $_REQUEST['campo'];
}
if (!empty($_POST['tipo_b'])) {
    $_SESSION['tipo_b'] = $_REQUEST['tipo_b'];
}
if (!empty($_POST['valor'])) {
    $_SESSION['valor'] = $_REQUEST['valor'];
}
if (!empty($_REQUEST['producto'])) {
    $_SESSION['producto'] = $_REQUEST['producto'];
}

if ($_SESSION['page'] != "variedades") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}


$prods = new Variedades();
$prods = $variedadesDAO->gets($_SESSION['campo'], 'ocurrencias', $_SESSION['valor']);
?>




<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4>Administracion / Productos y servicios / Labores por variedad </h4>

            <div class="help"><?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> 
            </div>



        </div>



        <div class="portlet-content">

            
            <div class="user_tit">
                <form onSubmit="return valida_cod()" name="busqueda" action="lista_.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="Codigo" <?php if ($_SESSION['campo'] == 'Codigo') { ?> selected="selected"<?php } ?>>Codigo</option>
                        <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                    </select>
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
                    <input type="hidden" name="page" id="page" value="variedades" />

                    <button class="btn btn-grey" onclick="document.getElementById('busqueda').submit()">Buscar</button>
                </form>
            </div>

            <div style="display:inline"  style="padding-left:10px">
                <div class="icon_botn" style="height:25px; width:10px">&nbsp;</div>
                <a href="lista_.php?page_bus=2" class="btn_editar l">

                    <div class="icon_botn" style="height:25px;"><img src="../images/icon_null.png" width="22" height="25" /></div>

                    Limpiar Filtro

                </a>

            </div>

            <div class="btn_right">



                <a href="excel_.php" class="btn_editar">

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div>

                    Exportar (CSV)
                </a>

                <br/><br/>

            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prods as $lab) { ?>
                        <tr class="odd gradeX">
                            <td><?= $lab->getCodigo() ?></td>             
                            <td><?= $lab->getNombre() ?></td>
                            <td>
                                <a href="lista.php?variedad=<?= $lab->getId() ?>" 
                                   class="btn_black">
                                    <div class="icon_botn"><img src="../images/page_white_copy.png" width="22" height="23" /></div>
                                    Labores PM
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php include '../includes/footer.php'; ?>	