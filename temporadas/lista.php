<?php include '../includes/header.php'; ?>
<?php
$temporadasDAO = new temporadasDAO();

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
if (!empty($_REQUEST['bloque'])) {
    $_SESSION['bloque'] = $_REQUEST['bloque'];
}
if (!empty($_POST['valor'])) {

    $_SESSION['valor'] = $_POST['valor'];
}


if ($_SESSION['page'] != "temporadas") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

if (strstr($_SESSION['campo'], "Hab")) {
    $_SESSION['valor'] = str_replace('si', '1', $_SESSION['valor']);
    $_SESSION['valor'] = str_replace('no', '0', $_SESSION['valor']);
}
$temporadasV = $temporadasDAO->getsbybuscar($_SESSION['bloque'], $_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
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

        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4> 

            <div class="help"><?php if ($archiv_ayuda != ""): ?>
                    <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
                <? endif; ?> </div>
        </div>



        <div class="portlet-content">


            <div class="user_tit" id="div_bus1">

                <form onSubmit="return valida_cod()" name="busqueda" id="busqueda" method="post"  action="lista.php" >Campo
                    <select name="campo" id="campo" onchange="cambia_busq()">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>						
                        <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                        <option value="Habilitado" <?php if ($_SESSION['campo'] == 'Habilitado') { ?> selected="selected"<?php } ?>>Habilitado</option>
                    </select>				
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>							
                    <input type="hidden" name="page" id="page" value="temporadas" />				
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
                
                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='temporadas_crear.php'">Nueva</button>
             

                <a href="excel.php" class="btn_editar">

                    <div class="icon_botn"><img src="../images/icon_export.png" width="22" height="23" /></div> 

                    Exportar (CSV)
                </a>

                <br><br>
                



            </div>	

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                <thead>
                    <tr>            
                        <th>ID</th>
                        <th>Nombre</th>							
                        <th>Habilitado</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($temporadasV as $temporadas) { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $temporadas->getId(); ?></td>  
                            <td><?php echo $temporadas->getNombre() ?></td>						
                            <td><?php echo str_replace('1', 'Si', str_replace('0', 'No', $temporadas->getHabilitado())); ?></td>
                            <td>

                                <? if ($modificar != 0) { ?>
                                    <a href="temporadas_editar.php?id=<?php echo $temporadas->getId(); ?>" class="btn_editar">

                                        <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div> 

                                        Editar</a>
                                <? } ?>

                                <a onClick="return confirma(this)" href="../php/action/temporadasDelete.php?id=<?php echo $temporadas->getId(); ?>" class="btn_black">

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
