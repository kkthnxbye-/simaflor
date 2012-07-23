<?php include '../includes/header.php'; ?>
<script>
   $(document).ready(function(){
      $('#valor,#valorS').hide();
   })
</script>
<!--<a class="absoluteIframeDOMWindow" href="asd.php">Open DOM Window</a> -->
<?php

//if(isset($_POST['valor'])){
//   echo 'valor:'.$_POST['valor']."<br>";
//}

//Obtengo las empresas por usuario que sean proveedoras
$UsuariosXEmpresaDAO = new UsuariosXEmpresaDAO();
$listaUsuariosXempresa = new UsuariosXEmpresa();
$listaUsuariosXempresa = $UsuariosXEmpresaDAO->getsByUsuario($usuario->getId());
//obtengo los grupos para saber si es admin o no
$grupoUsuarioDAO = new gruposUsuarioDAO();
$is_admin = $grupoUsuarioDAO->getById($usuario->getIdGrupoUsuario())->getId();

if ($is_admin == 1) {
   $_SESSION['id__'] = -10;
} else {
   $_SESSION['id__'] = $usuario->getId();
}
///

$pedidosDAO = new pedidosDAO();
$empresasDAO = new empresasDAO();
$materialesVegetalesDAO = new materialesVegetalesDAO();
$serviciosDAO = new serviciosDAO();
$estadospedidoDAO = new estadospedidoDAO();
$productosDAO = new productosDAO();
if (!empty($_REQUEST['page'])) {
   $_SESSION['page'] = $_REQUEST['page'];
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

if (!empty($_GET['fincaproduccion'])) {
   $_SESSION['fincaproduccion'] = $_GET['fincaproduccion'];
}


if ($_SESSION['page'] != "pedidosPM") {
   $_SESSION['fincaproduccion'] = '';
   $_SESSION['campo'] = "todos";
   $_SESSION['valor'] = "";
   $_SESSION['tipo_b'] = "parte";
}
//echo 'id',$usuario->getId();
//echo $_SESSION['id__']."<br>";
//echo "valorS:".$_SESSION['valor']."<br>";

if (!empty($_SESSION['fincaproduccion'])) {
   $pedidos = $pedidosDAO->getsbybuscar_r("IDFincaProduccion", '', $_SESSION['fincaproduccion'], '');
} else {
   $pedidos = $pedidosDAO->getsbybuscar_r($_SESSION['campo'], $_SESSION['tipo_b'], $_SESSION['valor'], '');
}
?>

<div id="content" class="xfluid">		
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4>
            <div class="help">
               <?php if($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?=$archiv_ayuda?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
               <? endif; ?> 
            </div>
        </div>			
        <div class="portlet-content">
            <div style="margin-top: 5px; width: 225px; float: left">
            Finca de producci&oacute;n
            <select id="fincaproduccion" name="fincaproduccion" class="medium" onchange="return goLoad()">
               <option value="0" <?php if (!isset($_SESSION['fincaproduccion'])): echo 'selected';
            endif; ?>>Seleccione</option>
               <?php foreach ($listaUsuariosXempresa as $finca__): ?>
                  <?php $data___ = new empresas(); ?>
                  <?php $data___ = $empresasDAO->getById($finca__->getIdEmpresa()); ?>
                  <?php if ($data___->getEsProveedor() == 1): ?>
                     <option <?php if ($_SESSION['fincaproduccion'] == $data___->getId()): echo 'selected';
               endif; ?> value="<?= $data___->getId(); ?>"><?= $data___->getNombre(); ?></option>
                  <?php endif; ?>
               <?php endforeach; ?>
            </select>   
         </div>
           <script>
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
           </script>
            <div class="user_tit">
                <form name="busqueda" action="lista.php" id="busqueda" method="post">
                Campo <select name="campo" id="campo" class="medium" onchange="getValues(this.value)">
                  <option value="todos" <?php if ($_SESSION['campo'] == 'todos') { ?> selected="selected"<?php } ?>>Todos</option>
                  <option value="IDFincaProveedor" <?php if ($_SESSION['campo'] == 'IDFincaProveedor') { ?> selected="selected"<?php } ?>>Proveedor</option>
                  <option value="IDFincaCliente" <?php if ($_SESSION['campo'] == 'IDFincaCliente') { ?> selected="selected"<?php } ?>>Cliente</option>
                  <option value="IDMaterialVegetal" <?php if ($_SESSION['campo'] == 'IDMaterialVegetal') { ?> selected="selected"<?php } ?>>Material Vegetal</option>
                  <option value="IDProducto" <?php if ($_SESSION['campo'] == 'IDProducto') { ?> selected="selected"<?php } ?>>Producto</option>
                  <option value="IDEstadoPedidoPM" <?php if ($_SESSION['campo'] == 'IDEstadoPedidoPM') { ?> selected="selected"<?php } ?>>Estado</option>
                  <option value="IDServicio" <?php if ($_SESSION['campo'] == 'IDServicio') { ?> selected="selected"<?php } ?>>Servicio</option>
               </select>

               <input type='hidden' name='tipo_b' id='tipo_b' value='parte_' />
               <span id="valorS">Valor</span>
               <select id="valor" name="valor">
                  
               </select>
               <input type="hidden" name="page" id="page" value="pedidosPM" />

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
                
               <?php if (!empty($_SESSION['fincaproduccion'])): ?>
                <button style="float: left;margin-right: 5px" 
                        class="btn btn-grey" 
                        onclick="location.href='pedidos_crear.php'">
                   Nuevo
                </button>
               <?php endif; ?>
                
               <a href="excel.php" class="btn_editar">
                     <div class="icon_botn">
                        <img src="../images/icon_export.png" width="22" height="23" />
                     </div> 
                     Exportar (CSV)
               </a>
                
                
            </div><br/><br/>

            <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
            <thead>
               <tr>
                  <td colspan="9">
                     <div id="detalleLive"></div>
                  </td>
               </tr>
               <tr>
                  <th>ID</th>
                  <th>Proveedor</th>
                  <th>Cliente</th>
                  <th>Material vegetal</th>
                  <th>Producto</th>
                  <th>Estado</th>
                  <th>Servicios</th>
                  <th>Opciones</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($pedidos as $pedido): ?>
                  <tr class="odd gradeX">
                     <td><?php echo $pedido->getId(); ?></td>
                     <td><?php echo $empresasDAO->getById($pedido->getFincaproveedor())->getNombre(); ?></td>
                     <td><?php echo $empresasDAO->getById($pedido->getFincacliente())->getNombre(); ?></td>
                     <td><?php echo $materialesVegetalesDAO->getById($pedido->getMaterialvegetal())->getNombre(); ?></td>
                     <td><?php echo $productosDAO->getById($pedido->getProducto())->getNombre(); ?></td>
                     <td><?php echo $estadospedidoDAO->getById($pedido->getEstadopedido())->getNombre(); ?></td>
                     <td>
                        <?php if($pedido->getServicio() != ""): 
                                 echo $serviciosDAO->getById($pedido->getServicio())->getNombre();
                              else: 
                                 echo 'Sin Servicio';
                              endif; ?>
                     </td>
                     <td>
                        
                        <a href="remisionesxpedido.php?pedido_id=<?= $pedido->getId(); ?>" class="btn_editar">
                           <div class="icon_botn">
                              <img src="../images/page_white_go.png" width="16" height="16" />
                           </div> 
                           Ver Remisiones
                        </a>

                        <a href="../pedidosInternoPM/documentos_pedido.php?pedido_id=<?= $pedido->getId(); ?>" class="btn_editar">
                           <div class="icon_botn">
                              <img src="../images/page_white_go.png" width="16" height="16" />
                           </div> 
                           Adjuntar
                        </a>
                        
                     </td>
                  </tr>

<?php endforeach; ?>
                     
            </tbody>
         </table>
        </div>
    </div>	
</div> <!-- #content -->	
<?php include '../includes/footer.php'; ?>


<script>
   
   function isNumber(num){
      var xpression = /^(?:\+|-)?\d+$/;
      if(xpression.test(num)){
         return true;
      }else{
         return false;
      }
   }
   
   function reconfirm(){
      var c = "Esta seguro de cambiar el estado de este pedido?";
      if(confirm(c)){
         var c1 = "Si cambia el estado de un pedido no podra volver al estado anterior. Esta seguro?";
         if(confirm(c1)){
            return true;
         }else{
            return false;
         }
      }else{
         return false;
      }
   }
    
   //    function showStatus(id,estado){
   //       $("#Status").fadeIn();
   //       $("#id").val(id);
   //       $("#estado").val(estado);
   //    }
    
   function getDetalle(id,estado){
      $.ajax({
         url:'getDetalle.php',
         type:'POST',
         data:{
            'id':id,
            'estado':estado
         },
         success:function(data){
            $("#detalleLive").show();
            $("#detalleLive").html(data);
         }
      });
   }
    
   function doTheCheck(id){
      var check = $('#check_'+id);
      if(check.is(':checked')){
         $('#cantidad_'+id).removeAttr('readonly');
      }else{
         $('#cantidad_'+id).attr('readonly','readonly');
      }
   }
    
   function unforgiven(){
      var contador = parseInt($('#countah').val());
      
      for(var i=1;i<=contador;i++){
         var cantidad = parseInt($('#cantidad'+i).val());
         var cantidad_ = parseInt($('#cantidad_'+i).val());
         //alert(cantidad_+', '+isNumber(cantidad_));
         
         
         if(cantidad_ > cantidad){
            $(function(){  msn.info().mostrar('La cantidad para aprobar no puede ser mayor a la cantidad inicial.');  });
            return false;
         }
         if(!isNumber(cantidad_) || cantidad_ < 0){
            $(function(){  msn.info().mostrar('Los recuadros verdes son datos numericos (Enteros).');  });
            return false;
         }
      }
      
      return reconfirm();
      
   }
    
    
   function goLoad(){
      if($('#fincaproduccion').val() != 0){
         window.location.href='lista.php?page=pedidosPM&fincaproduccion='+$('#fincaproduccion').val();
      }else{
         window.location.href='lista.php?page_bus=2';
      }
   }


</script>