<?php include '../includes/header.php'; ?>
<?php
$opcionesDAO = new opcionesDAO();
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

if (!empty($_REQUEST['modulo'])) {
    $_SESSION['modulo'] = $_REQUEST['modulo'];
}




if ($_SESSION['page'] != "opciones") {
    $_SESSION['campo'] = "todos";
    $_SESSION['valor'] = "";
    $_SESSION['tipo_b'] = "parte";
}

$opciones = $opcionesDAO->getsbybuscar($_SESSION['modulo'], $_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor']);
?>


<script type="text/javascript" src="../js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js" ></script>

<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Opciones</h4>
            <div class="help">

                <a href="../modulos/lista.php" class="btn_black">  
                    &nbsp;&nbsp;Atras
                </a>
                
               
               <?php if($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?=$archiv_ayuda?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
               <? endif; ?> 
            


            </div>
        </div>



        <div class="portlet-content">


            <div class="user_tit">
                <form onSubmit="return valida_cod()" name="busqueda" action="lista.php" id="busqueda" method="post">
                    Campo <select name="campo" id="campo">
                        <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                        <option value="UrlMenu" <?php if ($_SESSION['campo'] == 'UrlMenu') { ?> selected="selected"<?php } ?>>URL menu</option>
                        <option value="Nombre" <?php if ($_SESSION['campo'] == 'Nombre') { ?> selected="selected"<?php } ?>>Nombre</option>
                    </select>
                    <input type='hidden' name='tipo_b' id='tipo_b' value='parte' />
                    Valor
                    <input type="text" name="valor" id="valor"  value="<?php echo $_SESSION['valor'] ?>"/>
                    <input type="hidden" name="page" id="page" value="opciones" />

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

                <button style="float: left;margin-right: 5px" class="btn btn-grey" onclick="location.href='opciones_crear.php'">Nuevo</button>

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
                        <th>Modulo</th>
                        <th>Nombre</th>
                        <th>URL menu</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody id="contentLeft">
                    <?php foreach ($opciones as $opcion) { ?>
                        <tr class="odd gradeX" id="mod_<?= $opcion->getId() ?>">
                            <td title="Arrastra y suelta para un nuevo orden"><?php echo $opcion->getId(); ?></td>
                            <td title="Arrastra y suelta para un nuevo orden"><?php echo $modulosDAO->getById($opcion->getIdModulo())->getNombre(); ?></td>
                            <td title="Arrastra y suelta para un nuevo orden"><?php echo $opcion->getNombre() ?></td>
                            <td title="Arrastra y suelta para un nuevo orden"><?php echo $opcion->getUrlMenu() ?></td>
                            <td><a href="opciones_editar.php?id=<?php echo $opcion->getId(); ?>" class="btn_editar">

                                    <div class="icon_botn"><img src="../images/editar.png" width="22" height="23" /></div>

                                    Editar</a>

                                <a onclick="return confirma(this)" href="../php/action/opcionesDel.php?id=<?php echo $opcion->getId(); ?>" class="btn_black">

                                    <div class="icon_botn"><img  src="../images/icon_close.png" width="22" height="23" /></div>

                                    Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>








        </div>
    </div>



</div> <!-- #content -->

<style type="text/css">
    .ui-state-highlight { height: 10em; line-height: 1.2em; background:#FFC; }
    #contentLeft td{ cursor:move; }
</style>
<script type="text/javascript">
      $(document).ready(function(){
             $(function() {
                    $("#contentLeft").sortable({ 
                handle: 'td:first,td:second',
                
                opacity: 0.6, 
                cursor: 'move', 
                update: function(event, ui) {
                    var newOrder = $('#contentLeft').sortable('serialize');
                    
                    $.ajax({
                        url : '../php/action/opcionesOrden.php',
                        type : 'POST',
                        data : newOrder,
                                          
                        success : function(json){
					
                            if(true == json.ok){
                                topNot.showNot('Orden guardado').hideTime();
                            }
                        }
                    });
			
            
                },
                activate: function(event, ui) { 
                    $('.ui-state-highlight').wrapInner('<td colspan="5" align="center"><strong>Arrastrar acá para guardar el nuevo orden</strong></td>');
                }
            }).disableSelection();
            
           
             });
      });
</script>
<div id="footer">



    <p style="font-family: arial;"><a href="http://imaginamos.com/" target="_blank"><font color="#666666" size="1" style="text-decoration: none">Dise&ntilde;o Web:</font></a><a href="http://imaginamos.com/" target="_blank"><font color="#666666" size="1"> Imagin</font><span><font color="#0099CC" size="1">a</font></span><font color="#666666" size="1">mos.com</font></a></p>



</div> <!-- #footer -->



