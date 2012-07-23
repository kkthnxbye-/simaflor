<?php
session_start();
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
//include '../php/dao/daoConnetion.php'; 
?>
<?php
require_once '../php/clases.php';
$usuario = new usuarios();
$usuario = unserialize($_SESSION['user']);
$empresasDAO = new empresasDAO();
$opcionesDAO = new opcionesDAO();
$modulosDAO = new modulosDAO();
$permisosXOpcionXGrupoUsuarioDAO = new permisosXOpcionXGrupoUsuarioDAO();
$permisos = $permisosXOpcionXGrupoUsuarioDAO->getsbygrupo($usuario->getIdGrupoUsuario());
$lista_dinc = $empresasDAO->getsbybuscar_odst($usuario->getId());
if (empty($_SESSION['finca'])) {
    $_SESSION['finca'] = "-1";
}
if (!empty($_REQUEST['finca'])) {
    $_SESSION['finca'] = $_REQUEST['finca'];
}

$url = substr($_SERVER['REQUEST_URI'], 1);

$part = explode("?", $url);
if ($url != "index/index2.php") {


    $url_2 = $part[0];
    $opcion_m = $opcionesDAO->getByUrl($url_2);



    if ($opcion_m != null) {
        $archiv_ayuda = $opcion_m->getRutaArchivoAyuda();
        $opcion = $permisosXOpcionXGrupoUsuarioDAO->Confirmas($usuario->getIdGrupoUsuario(), $opcion_m->getId());
        $consultar = 0;
        $modificar = 0;

        if ($opcion == null) {
            header("Location: ../index.php");
            exit;
        }

        if ($opcion->getPermiteConsultar()) {
            $consultar = 1;
        }

        if ($opcion->getPermiteModificar()) {
            $modificar = 1;
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>01_simaflor</title>	



        <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	

        <link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	

        <link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

        <!-- LightBox -->
        <script src="../js/Dom.js" type="text/javascript"></script>

        <!-- /LightBox -->

        <style type="text/css">

            #jdialogo{
                border-radius: 5px;
                text-align: center;
                width: 500px;
                margin:1em auto;
                display:none;
                position: fixed;
                z-index: 9999;
                left: 35%;
                top: 1%;
            }

            #jdialogo p{ padding:1em 0; margin:0; }


            #jdialogo.errormsn{ background-color: #FFCCCC;border: 1px solid red;color: #FF0000; }
            #jdialogo.okmsn{ background-color:  #BBEABC;border: 1px solid #1A611B;color: #1A611B;}
            #jdialogo.infomsn{ background-color: #CDD0EB;border: 1px solid #2837E3;color: #2837E3; }

        </style>



        <script type="text/javascript">
            $(document).ready(function(){
                $('#Status,#detallelive').hide();
                
            });
    
            (function($){
          
           
                   window.msn = {
                           obj : $('<div id="jdialogo" />'),
                           error : function(){
                                   this.obj.addClass('errormsn');
                                   return this;
                           },
                           ok : function(){
                                   this.obj.addClass('okmsn');
                                   return this;
                           },
                           info : function(){
                                   this.obj.addClass('infomsn');
                                   return this;
                           },
                           mostrar : function(msg){
                                   var self = this;
                                   this.obj.empty();
                                   this.obj.wrapInner(function(){
                                           return '<p>'+msg+'</p>';
                                   }).prependTo('body').fadeIn();
                                   
                                   this.t = setTimeout(function(){
                                           self.obj.fadeOut('slow', function(){
                                
                                                   return $(this).remove();
                                           });
                                   }, 5000);
                           },
                    mostrar2 : function(msg){
                                   var self = this;
                        this.obj.empty();
                                   this.obj.wrapInner(function(){
                                           return '<p>'+msg+'</p>';
                                   }).prependTo('#detalle').fadeIn();
                                   
                                   this.t = setTimeout(function(){
                                           self.obj.fadeOut('slow', function(){
                                                   return $(this).remove();
                                           });
                                   }, 5000);
                           }
                   };
            })(jQuery);

<?php
if (isset($_REQUEST['er1'])) {
    echo "$(function(){  msn.error().mostrar('Recuerde que los campos marcados (*) son obligatorios.');  });";
}
?>
<?php
if (isset($_REQUEST['er2'])) {
    echo "$(function(){  msn.error().mostrar('Este codigo ya existe.');  });";
}
?>
<?php
if (isset($_REQUEST['er3'])) {
    echo "$(function(){  msn.error().mostrar('Este item no puede ser elimando por que tiene items relacionados actualmente.');  });";
}
?>
<?php
if (isset($_REQUEST['er4'])) {
    echo "$(function(){  msn.info().mostrar('Los recuadros verdes son datos numericos (Enteros).');  });";
}
?>
<?php
if (isset($_REQUEST['er5'])) {
    echo "$(function(){  msn.error().mostrar('Ya existe un usuario con este Login.');  });";
}
?>
<?php
if (isset($_REQUEST['ok'])) {
    echo "$(function(){  msn.ok().mostrar('Proceso Exitoso.');  });";
}
?>
<?php
if (isset($_REQUEST['inf'])) {
    echo "$(function(){  msn.info().mostrar('Por favor haga las selecciones pertinentes de la(s) lista(s).');  });";
}
?>
            

    function confirma(formObj) { 
        if(!confirm("Si elimina este ítem no hay forma de devolver esta acción. Si desea \ncontinuar Click en Aceptar, Si no Click en Cancelar")) { 
            return false;
        }else{
            if(!confirm("¿Está seguro de realizar esta acción?")){
                return false;
            }
        }
        return true;
    }
            
    function confirmaFor(formObj) { 
        if(!confirm("Una vez los consecutivos tengan un valor mayor a cero, no se podra editar mas y no hay forma de devolver esta acción, en"
            +"\ncaso de no digitar numeros en esto campos no se tomara este registro. Si desea \ncontinuar Click en Aceptar, Si no Click en Cancelar")) { 
            return false;
        }else{
            if(!confirm("¿Está seguro de realizar esta acción?")){
                return false;
            }
        }
    }
            
            
        </script>

    </head>



    <body>



<?php if ($_GET['banB'] != 7): ?>
        <div id="wrapper">



            <div id="header">

                <div class="logo"><img src="../images/logo.png" width="320" height="95" alt="Logo.png" /></div>

                <div id="info">

                    <div class="info_user">
                        <div style="font-size: 11px">
                            <b>Usuario:</b><br> <?php echo $usuario->getNombre(); ?>
                        </div>
                    </div>

                    <div class="info_date">



                        <form method="post" class="form label-inline" aling="left" id="form_fincas">

                            <div class="field">

                                <!--                                <label for="type">Finca</label>
                                
                                                                <select size="1" name="finca" class="finca" id="finca" id="type" onchange="document.getElementById('form_fincas').submit();">
                                                                    <option value="-1" <?php //if ($_SESSION['finca'] == "-1") {      ?> selected="selected"<?php //}      ?>>Seleccione</option>
                                <?php
//foreach ($lista_dinc as $finc) {
//if ($finc->getHabilitado() == 1) {
                                ?>
                                
                                                                            <option value="<?php //echo $finc->getId();      ?>" <?php //if ($_SESSION['finca'] == $finc->getId()) {      ?> selected="selected"<?php //}      ?>><?php //echo $finc->getNombre()      ?></option>
                                
                                <?php
//}
//}
                                ?>
                                
                                                                </select>-->
                                <!--
                                   When you were a young girl i took you into the city, i said when you grow up would you be the most nice woman
                                   i said will you ya defeat them your demons and all the none belieavers the plans that they had made, coz
                                   one day ill leave ya a phanton to leade ya in the summah to join the black parade!!!
                                
                                   Sometimes you'll have the feeling im watching oveah you and otha times you;ll feel like you should go ....
                                
                                -->
                            </div>

                        </form>

                    </div>


                    
                        <div class="info_out"><button class="btn btn-black" onclick="location.href='../salir.php'">Salir</button></div>
                    


                </div>







            </div> 
            
            

            <!-- #info -->



        </div> <!-- #header -->	
<?php endif; ?>
        <!--<ul class="mega-container mega-grey">
                        <li class="mega">
                            <a href="#" class="mega-link">Maestros</a>					
                            <div class="mega-content mega-menu ">
                                <ul>
        <?php
//                            $modulo = 0;
//                            foreach ($permisos as $permi) {
//                                $obj_opt = $opcionesDAO->getById($permi->getIdOpcion());
//                                 if ($modulo != $obj_opt->getIdModulo()) {
//                                    if ($modulo > 0) {
//                                        
        ?>
                                                  </ul></li>
        <?php
//        }
//        $modulo = $obj_opt->getIdModulo();
//        $obj_modulo = $modulosDAO->getById($modulo);
        ?>
                                <li><a href="javascript:;" class="hasSub"><?php //echo $obj_modulo->getNombre()      ?></a>	
                                   <ul>
        <?php //}  ?>
                                            <li>
                                               <a href="../<?php //echo $obj_opt->getUrlMenu()    ?>">
        <?php //echo $obj_opt->getNombre() ?>
                                               </a>
                                            </li>
        <?php //}  ?>
                                   </ul>
                                </li>	
        
        
                    </ul>-->

        <?php //Armo el Menu   ?>
        <?php include '../php/entities/menu_raiz.php'; ?>
        <?php include '../php/dao/menu_raizDAO.php'; ?>
        <?php $raiz = new Menu_raizDAO(); ?>
        <?php $raizLista = $raiz->getByOrder(); ?>
        <?php //print_r($raizLista); ?>

        <?php if ($_GET['banB'] == 7): ?>
            <div style="width: 100%;-border: 1px solid red;height: 10px;"></div>
        <?php endif; ?>


        <?php if ($_GET['banB'] != 7): ?>
            <div id="nav">	
                <ul class="mega-container mega-grey">
                    <?php foreach ($raizLista as $item): ?>
                        <li class="mega">
                            <a href="#" class="mega-link"><?php echo $item->getNombre(); ?></a>
                            <div class="mega-content mega-menu ">
                                <ul>
                                    <?php $modulos_ = $modulosDAO->getsByRaiz($item->getId()); ?>
                                    <?php //print_r($modulos_); ?>
                                    <?php foreach ($modulos_ as $item_): ?>
                                        <li>



                                            <a href="javascript:;" class="hasSub"><?php echo $item_->getNombre(); ?></a>



                                            <?php $submodulos_ = $opcionesDAO->getByModulo($item_->getId()); ?>
                                            <?php if (!empty($submodulos_)): ?>
                                                <ul>
                                                    <?php foreach ($permisos as $permiso): ?>
                                                        <?php foreach ($submodulos_ as $item__): ?>
                                                            <?php if ($permiso->getIdOpcion() == $item__->getId()): ?>
                                                                <li>
                                                                    <a href="../<?php echo $item__->getUrlMenu(); ?>">
                                                                        <?php echo $item__->getNombre(); ?>
                                                                    </a>
                                                                </li>

                                                            <?php endif; ?>



                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </ul>   
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>	
        <?php endif; ?>
        </li>

        <?php
        if ($opcion_m != NULL) {
            $opcion_miga = $opcion_m->getNombre();

            $modulo_miga = $modulosDAO->getById($opcion_m->getIdModulo())->getNombre();

            $raiz_miga = $raiz->getRaizByModulo($modulosDAO->getById($opcion_m->getIdModulo())->getIdMenuRaiz())->getNombre();

            $miga_de_pan = ucfirst(strtolower($raiz_miga)) . " / " . ucfirst(strtolower($modulo_miga)) . " / " . ucfirst(strtolower($opcion_miga));

            $_SESSION['url_'] = $miga_de_pan;
        }
        ?>



        <!--        <li class="mega">				
        
                    <a href="#" class="mega-link">Pedidos</a>
                    <div class="mega-content mega-menu ">
                       <ul>
                          <li class="hasSub"><a href="../pedidos/lista.php">Pedidos (Usuario Interno)</a></li>
                          <li class="hasSub"><a href="../pedidos/lista.php">Pedidos (Cliente)</a></li>
                          <li class="hasSub"><a href="../remisiones/lista.php">Remisiones</a></li>
                          <li class="hasSub"><a href="#">Revisiones</a></li>
                       </ul>
                    </div>
        
                </li>-->

        </ul>

        </div> 




