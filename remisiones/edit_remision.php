<?php session_start(); ?>
<?php 
include '../php/dao/daoConnection.php';
include '../php/entities/remisiones.php';
include '../php/entities/detalleRemision.php';
include '../php/dao/remisionesDAO.php';
include '../php/entities/pedidos.php';
include '../php/dao/pedidosDAO.php';
include '../php/entities/Variedades.php';
include '../php/dao/VariedadesDAO.php';


$id = $_GET['id'];

$remisionesDAO = new remisionesDAO();
$remision = new remisiones();

$remision = $remisionesDAO->getOne($id);


/*************************************************************************************/

$pedidosDAO = new pedidosDAO();
$pedido = new pedidos();

$pedido = $pedidosDAO->getById($remision->getIDPedidoPM());

/*************************************************************************************/

$variedadesDAO = new VariedadesDAO();
$variedades_lista = new Variedades();

$variedades_lista = $variedadesDAO->gets('IDProducto','asd',$pedido->getProducto());

/*************************************************************************************/

$detalles = new detalleRemision();
$detalles = $remisionesDAO->getAllDetalle($id);

/*************************************************************************************/

?>
<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
<link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
<link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />
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
<script src="../js/jquery-1.3.2.js" type="text/javascript"></script>
<script src="../js/calendario_k.js" type="text/javascript"></script>
<style type="text/css">

            #jdialogo{
                border-radius: 5px;
                text-align: center;
                width: 500px;
                height: 50px;
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
   
   function isNumber(num){
      var xpression = /^(?:\+|-)?\d+$/;
      if(xpression.test(num)){
         return true;
      }else{
         return false;
      }
   }
   
   function getDetalle_(){
      $.ajax({
         url:'getListaDetallesEditar.php',
         type:'GET',
         data:{
            'id' : <?php echo $id; ?>
         },
         success:function(data){
            jQuery('#detalle_edd').html(data);
         }
      })
   }
   function agregar_detalleremision_(id){
      var cantidad = jQuery('#cantidad').val();
      var variedad = jQuery('#variedad').val();
      
      if(variedad == 0){
         alert('Seleccione un elemento de la lista');
         return false;
      }
      if(parseInt(cantidad) < 0 || !isNumber(parseInt(cantidad))){
         alert('La cantidad debe ser un numero mayor o igual a cero');
         return false;
      }
      
      $.ajax({
         url:'agregar_detalle_edita.php',
         type:'GET',
         data:{
          'id' : id,
          'variedad' : variedad,
          'cantidad' : cantidad
         },
      success:function(){
         jQuery('#cantidad').val('');
         jQuery('#variedad').val('');
      }
      });
   }
   
   function delete_detalleremision_(id){
      $.ajax({
         url:'deleteDetalle.php',
         type:'GET',
         data:{
            'id':id
         }
      });
   }
   
   function update_remision(id){
      var noremision = jQuery('#noremision').val();
      var fecharemision = jQuery('#fecharemision_B').val();
      if(noremision == "" || fecharemision == ""){
         alert('Recuerde que los campos marcados con * son obligatorios');
         return false;
      }
      jQuery.ajax({
         url:'update_remision.php',
         type:'GET',
         data:{
            'id' : id,
            'noremision' : noremision,
            'fecharemision' : fecharemision
         },
         success:function(){
            alert('Proceso Exitoso');
            jQuery('#noremision').val(noremision);
            jQuery('#fecharemision_B').val(fecharemision);
         }
      })
   }
   
   jQuery(document).ready(function(){
      setInterval(function() {
         getDetalle_();
      }, 1000);
      jQuery('#fecharemision_B').calendarioDW("2011/01/01","2020/12/31");
   });
</script>
<div id="edit_remision" style="background: #EFEFEF;font-family: arial;padding: 1em;">
               <h4><?php echo $_SESSION['url_']; ?>/ Editar</h4>
               <div class="caja1">
                  <div class="caja-separador">
                     <label>No Remision <strong style="color:red">*</strong></label>
                     <input type="text" id="noremision" name="noremision" required value="<?php echo $remision->getNoRemision(); ?>">
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
                     <?php $fecha1 = explode(" ",$remision->getFechaRemision()); ?>
                     <input type="text" id="fecharemision_B" name="fecharemision" required value="<?php echo $fecha1[0]; ?>">
                  </div>
                  <div class="caja-separador">
                     <label>Cantidad <strong style="color:red">*</strong></label>
                     <input type="text" id="cantidad" name="cantidad" required>
                  </div>
               </div>
               <div class="buttons">
                  
                  <button class="btn btn-grey" onclick="return agregar_detalleremision_(<?php echo $id; ?>)">Agregar</button>
<!--                  <a style="margin-right: 5px" class="btn btn-grey" id="closeDOM" href="#new_remision">
                     Cerrar
                  </a>-->
               </div>
               <div id="detalle_edd">
                  
               </div>
            </div>
