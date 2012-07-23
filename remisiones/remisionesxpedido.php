<?php include '../includes/header.php'; ?>
<?php

include_once '../php/dao/daoConnection.php';

include_once '../php/dao/remisionesDAO.php';
include_once '../php/entities/remisiones.php';

include_once '../php/dao/pedidosDAO.php';
include_once '../php/entities/pedidos.php';

include_once '../php/dao/VariedadesDAO.php';
include_once '../php/entities/Variedades.php';

$remisionesDAO = new remisionesDAO();
$pedidosDAO = new pedidosDAO();

//if (!empty($_REQUEST['page'])) {
//   $_SESSION['page'] = $_REQUEST['page'];
//}
//if (!empty($_REQUEST['page_bus'])) {
//   $_SESSION['page'] = "busk_sin";
//}
//if (!empty($_POST['campo'])) {
//   $_SESSION['campo'] = $_POST['campo'];
//}
//if (!empty($_POST['tipo_b'])) {
//   $_SESSION['tipo_b'] = $_POST['tipo_b'];
//}
//if (!empty($_POST['valor'])) {
//   $_SESSION['valor'] = $_POST['valor'];
//}

if (!empty($_REQUEST['modulo'])) {
   $_SESSION['modulo'] = $_REQUEST['modulo'];
}

$_SESSION['detalle_remision'] = '';

//if (!empty($_GET['fincaproduccion'])) {
//   $_SESSION['fincaproduccion'] = $_GET['fincaproduccion'];
//}

//if ($_SESSION['page'] != "remisionesPM") {
//   $_SESSION['fincaproduccion'] = '';
//   $_SESSION['campo'] = "todos";
//   $_SESSION['valor'] = "";
//   $_SESSION['tipo_b'] = "parte";
//}

if(!empty($_GET['pedido_id'])){
   $_SESSION['IDPedido'] = $_GET['pedido_id'];
}

$remisiones = new remisiones();
$remisiones = $remisionesDAO->getAll($_SESSION['IDPedido']);


$pedidos = new pedidos();
$pedidos = $pedidosDAO->getById($_SESSION['IDPedido']);

$producto_id_ = $pedidos->getProducto();

$vDAO = new VariedadesDAO();

$variedades_lista = new Variedades();
$variedades_lista = $vDAO->gets('IDProducto','asd',$producto_id_);


//echo '<pre>';
//print_r($remisiones);
//echo '</pre>';
//exit;


?>



<style>
   .caja1{
      padding: 1em; 
      border-radius: 10px;
      border: 1px solid #204722;
      width: 370px;
      float: left;
   }
   .caja2{
      padding: 1em; 
      border-radius: 10px;
      border: 1px solid #204722;
      width: 370px;
      float: right;
   }
   
   div label{
      display: block;
   }
   
   .buttons{
      width: 800px;
      float: left;
      margin-bottom: 5px;
      margin-top: 5px;
   }
</style>
<style>
   .capacalendario{
      width: 219px;
      position: absolute;
      display: none;
      background-color: #fff;
      z-index:50000;
   }
   .capacalendarioborde{
      padding: 3px;
      border: 1px solid #ddd;
   }
   .diassemana{
      overflow: hidden;
      margin: 3px 0;
      clear: both;
      background-image: url(../img/back_blue.png);
      background-repeat: repeat-x;
   }
   .diasmes{
      overflow: hidden;
   }
   .diassemana span, .diasmes span{
      margin: 3px;
      width: 25px;
      display: block;
      float: left;
      text-align: center;
      height: 1.5em;
      line-height: 1.5em;
      font-size: 0.875em;
   }
   .diassemana span{
      text-transform: uppercase;
      color: #fff;
      font-weight: bold;
      height: 1.8em;
      line-height: 1.8em;
   }
   .diasmes span{
      background: #ddd;
      cursor: pointer;
   }
   .diasmes span.diainvalido{
      cursor: default;
      background-color: #FFF;
   }
   .diasmes span.domingo{
      color: #c00;
   }
   .capacalendario span.primero{
      margin-left:0 !important;
   }
   .capacalendario span.ultimo{
      margin-right:0 !important;
   }

   a.botoncal{
      margin-left: 5px;
      background: transparent url(../img/calendario.png) no-repeat;
   }
   a.botoncal span{
      display: inline-table;
      width: 16px;
      height: 16px;
   }
   a.botonmessiguiente{
      float: right;
      background: transparent url(../img/105.png) no-repeat;
      margin: 5px 5px 0 5px;
      height:10px;
   }
   a.botonmessiguiente span, a.botonmesanterior span, a.botoncambiaano span{
      display: inline-table;
      width: 10px;
      height: 10px;
   }
   a.botonmesanterior{
      float: left;
      background: transparent url(../img/106.png) no-repeat;
      margin: 5px 5px 0 5px;
      height:10px;
   }
   a.botoncambiaano{
      background: transparent url(../img/193.png) no-repeat;
      margin: 5px 5px 0 5px;
      font-size: 0.8em;
   }
   .textomesano{
      background-color: #FFF;
      overflow: hidden;
      padding: 2px;
      font-size: 0.8em;
      font-weight: bold;
      text-align: center
   }
   .mesyano{
      margin-top: 3px;
   }
   .visualmesano{
      display: inline;
   }
   .capacerrar{
      background-color: #EAEAEA;
      overflow: hidden;
      padding: 2px;
      font-size: 0.5em;
   }
   a.calencerrar{
      float: right;
      margin: 2px 5px 0 5px;
      background-color: #E0E0E0;
      background-image: url(../img/101.png);
      background-repeat: no-repeat;
   }
   a.calencerrar span{
      display: inline-table;
      width: 10px;
      height: 10px;
   }
   .capaselanos{
      width: 50px;
      display: none;
      font-size: 0.8em;
      text-align: center;
      position: absolute;
      background-color: #fff;
      border: 1px solid #ddd;
   }
   .capaselanos a{
      display: block;
      text-decoration: none;
      border-bottom: 1px solid #ddd;
      padding: 2px 0;
   }
   .capaselanos a.seleccionado{
      background-color: #069;
      font-weight: bold;
      color: #FFF;
   }
   .capaselanos a.ultimo{
      border: 0;
   }

</style>


<div id="content" class="xfluid">		
   <div class="portlet x12">
      <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4>
         <div class="help"></div>
      </div>			
      <div class="portlet-content">

         <div class="user_tit">
            
         </div>
         <div style="display:inline"  style="padding-left:10px">
            
         </div>
         <div class="btn_right">

            <a style="float: left;margin-right: 5px" class="btn btn-grey" id="new_" href="#new_remision">
               Nuevo
            </a>
            
            <div id="new_remision" style="display: none; background: #EFEFEF">
               <h4><?php echo $_SESSION['url_']; ?>/ Nuevo</h4>
               <div class="caja1">
                  <div class="caja-separador">
                     <label>No Remision <strong style="color:red">*</strong></label>
                     <input type="text" id="noremision" name="noremision" required>
                  </div>
                  <div class="caja-separador">
                     <label>Variedad <strong style="color:red">*</strong></label>
                     <select id="variedad" name="variedad" style="width: 150px">
                        <option value="0">Seleccion</option>
                        <?php foreach($variedades_lista as $v): ?>
                        <option value="<?php echo $v->getId(); ?>">
                           <?php echo $v->getNombre(); ?>
                        </option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="caja2">
                  <div class="caja-separador">
                     <label>Fecha Remisi&oacute;n <strong style="color:red">*</strong></label>
                     <input type="text" id="fecharemision_A" name="fecharemision" required>
                  </div>
                  <div class="caja-separador">
                     <label>Cantidad <strong style="color:red">*</strong></label>
                     <input type="text" id="cantidad" name="cantidad" required>
                  </div>
               </div>
               <div class="buttons">
                  
                  <button class="btn btn-grey" onclick="return agregar_detalleremision()">Agregar</button>
                  <a style="margin-right: 5px" class="btn btn-grey" id="closeDOM" href="#new_remision">
                     Cerrar
                  </a>
               </div>
               <div id="detalle">
                  <?php print_r($_SESSION['detalle_remision']);?>
               </div>
            </div>
<script type="text/javascript"> 
   $('#closeDOM').closeDOMWindow({
      eventType:'click'
   });
   $('#new_').openDOMWindow({ 
      eventType:'click', 
      loader:1, 
      loaderImagePath:'animationProcessing.gif', 
      loaderHeight:16, 
      loaderWidth:17,
      width: 800,
      height:450
   });
   
</script> 
               

            <a href="excel.php" class="btn btn-grey">
               <div class="icon_botn">
                  <img src="../images/icon_export.png" width="22" height="23" />
               </div> 
               Exportar (CSV)
            </a>


         </div>

         <br/><br/>

         <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
            <thead>
               <tr>
                  <td colspan="9">
                     <div id="detalleLive"></div>
                  </td>
               </tr>
               <tr>
                  <th>ID</th>
                  <th>No Remision</th>
                  <th>Fecha Remision</th>
                  <th>Fecha Registro</th>
                  <th>Opciones</th>
               </tr>
            </thead>
            <tbody id="cargartodo">
               
            </tbody>
         </table>
      </div>
   </div>	
</div> <!-- #content -->	

<script>
   
   function isNumber(num){
      var xpression = /^(?:\+|-)?\d+$/;
      if(xpression.test(num)){
         return true;
      }else{
         return false;
      }
   }
   
   function reload_(){
      window.location.reload()
   }
   
   function delete_remision_(id){
      
      $.ajax({
         url:'delete_remision_.php',
         type:'GET',
         data:{
            'id':id
         },
         success:function(data){
            if(data == 1){
               $(function(){  msn.ok().mostrar('Preceso Exitoso');  });
            }else{
               $(function(){  msn.error().mostrar('El item no pudo ser eliminado, verifique que no tenga relacion con otros items');  });
            }
            setTimeout('reload_()',3000);
         }
      });
   }
   
   function getValues(value){
      if(value != 'todos'){
         $.ajax({
            url:'../pedidosInternoPM/makeDrop.php',
            type:'POST',
            data:{
               'value_':value
            },
            success:function(data){
               $('#valor').html(data);
               $('#valorS').show();
               $('#valor').show();
            }
         });
      }else{
         location.href = 'lista.php?page_bus=2';
      }
   }
   
   
   
   function cargar_detalle(){
      $.ajax({
         url:'lista_detalle.php',
         type:'POST',
         data:{
          'idpedido': <?php echo $_GET['pedido_id']; ?>  
         },
         success:function(data){
            $('#detalle').html(data);
         }
      });
   }
   
   function agregar_detalleremision(){
      var Variedad = $('#variedad').val();
      var Cantidad = $('#cantidad').val();
      
//      alert(NoRemision+Variedad+FechaRemision+Cantidad);
//      return false;
      if(Variedad == 0){
         $(function(){  msn.error().mostrar2('Seleccione un elemento de la lista.');  });
         return false;
      }
      if(parseInt(Cantidad) < 0 || !isNumber(parseInt(Cantidad))){
         $(function(){  msn.error().mostrar2('Las cantidades deben ser mayores o iguales a cero.');  });
         return false;
      }else{
         $.ajax({
            url:'agregar_detalleremision.php',
            type:'POST',
            data:{
               'variedad' : Variedad,
               'cantidad' : Cantidad
            },
            success:function(){
               $('#variedad').val('');
               $('#cantidad').val('');
               cargar_detalle();
            }
         });
      }
      return true;
   }
   
   function delete_detalleremision(id){
      $.ajax({
         url:'detalleremision_delete.php',
         type:'POST',
         data:{
            'id':id
         },
         success:function(data){
            //alert(data);
            cargar_detalle();
         }
      });
   }

   function saveremisiondetalle(){
      var noremision = $('#noremision').val();
      var fecharemision = $('#fecharemision_A').val();
      
      if(noremision == "" || fecharemision == ""){
         $(function(){  msn.error().mostrar2('Recuerde que los campos marcados con * son obligatorios');  });
         return false;
      }
      
      $.ajax({
         url:'addRemision.php',
         type:'POST',
         data:{
            'IDPedido' : <?php echo $_SESSION['IDPedido']; ?>,
            'fecharemision' : fecharemision,
            'noremision' : noremision
         },
         success:function(){
            $('#fecharemision').val('');
            $('#noremision').val('');
            $(function(){  msn.ok().mostrar2('Preceso Exitoso');  });
            
         }
      });
      return true;
   }
   
   $(document).ready(function(){
      setInterval(function() {
      jQuery.ajax({
         url:'content.php',
         type:'GET',
         data:{
            'pedido_id' : <?php echo $_GET['pedido_id']; ?>
         },
         success:function(data){
            jQuery('#cargartodo').html(data);
         }
      });
      }, 1000);
      
      
      $('#fecharemision_A').calendarioDW("2011/01/01","2020/12/31");
   });
</script>
<?php include '../includes/footer.php'; ?>
<script src="../js/calendario_k.js"></script>