<?php include '../includes/header.php'; ?>
<link rel="stylesheet" media="all" href="items.css" />

<?php
if (empty($_SESSION['fincaproduccion'])) {
   header('Location: lista.php?clear');
}

include_once '../php/entities/productos.php';
include_once '../php/dao/productosDAO.php';

include_once '../php/entities/productosXFinca.php';
include_once '../php/dao/productosXFincaDAO.php';

include_once '../php/entities/materialesVegetales.php';
include_once '../php/dao/materialesVegetalesDAO.php';

include_once '../php/entities/breeders.php';
include_once '../php/dao/breedersDAO.php';

include_once '../php/entities/temporadas.php';
include_once '../php/dao/temporadasDAO.php';

include_once '../php/entities/ciclos.php';
include_once '../php/dao/ciclosDAO.php';

include_once '../php/entities/bloquespmxfinca.php';
include_once '../php/dao/bloquespmxfincaDAO.php';

$pDAO = new productosDAO();
$pXfDAO = new productosXFincaDAO();
$mDAO = new materialesVegetalesDAO();
$bDAO = new breedersDAO();
$tDAO = new temporadasDAO();
$cDAO = new ciclosDAO();
$bxfDAO = new bloquespmxfincaDAO();


$p = new productos();
$m = new materialesVegetales();
$b = new breeders();
$t = new temporadas();
$c = new ciclos();
$bxf = new bloquespmxfinca();

$pXf = $pXfDAO->getsbybuscar($_SESSION['fincaproduccion'], '', '', '');
$m = $mDAO->gets();
$b = $bDAO->gets();
$t = $tDAO->gets();
$c = $cDAO->gets();
$bxf = $bxfDAO->getsbybuscar($_SESSION['fincaproduccion'], $campo, $tipob, $valor)
?>
<div id="content" class="xfluid">

   <div class="portlet x12">

      <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?>/ Nuevo</h4></div>



      <div class="portlet-content">
         <table>
            <tr>
               <td>Producto <strong class="required">*</strong></td>
               <td>
                  <select id="producto">
                     <option value="">Seleccione</option>
                     <?php foreach ($pXf as $pxf): ?>
                        <?php $p = $pDAO->getById($pxf->getIdProducto()); ?>
                        <option value="<?php echo $p->getId(); ?>"><?php echo $p->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Material Vegetal <strong class="required">*</strong></td>
               <td>
                  <select id="vegetal">
                     <option value="">Seleccione</option>
                     <?php foreach ($m as $ms): ?>
                        <option value="<?php echo $ms->getId(); ?>"><?php echo $ms->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Variedad <strong class="required">*</strong></td>
               <td>
                  <select id="variedad"></select>
               </td>

               <td>Breeder <strong class="required">*</strong></td>
               <td>
                  <select id="breeder">
                     <option value="">Seleccione</option>
                     <?php foreach ($b as $bs): ?>
                        <option value="<?php echo $bs->getId(); ?>"><?php echo $bs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Proveedor <strong class="required">*</strong></td>
               <td>
                  <input type="text" name="proveedor" id="proveedor" />
                  <input type="hidden" name="proveedor_" id="proveedor_" />
                  <div id="proveedor_show"></div>
               </td>

               <td>Cliente <strong class="required">*</strong></td>
               <td>
                  <input type="text" name="cliente" id="cliente" />
                  <input type="hidden" name="cliente_" id="cliente_" />
                  <div id="cliente_show"></div>
               </td>

               <td>Fecha Siembra <strong class="required">*</strong></td>
               <td><input type="text" name="fechaSiembra" id="fechaSiembra" /></td>
               
               <td>Alias</td>
               <td><input type="text" name="alias" id="alias" /></td>

            </tr>
            <tr>
               <td>Temporada</td>
               <td>
                  <select id="temporada">
                     <option value="">Seleccione</option>
                     <?php foreach ($t as $ts): ?>
                        <option value="<?php echo $ts->getId(); ?>"><?php echo $ts->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Ciclo <strong class="required">*</strong></td>
               <td>
                  <select id="ciclo">
                     <option value="">Seleccione</option>
                     <?php foreach ($c as $cs): ?>
                        <option value="<?php echo $cs->getId(); ?>"><?php echo $cs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Bloques <strong class="required">*</strong></td>
               <td>
                  <select id="bloques">
                     <option value="">Seleccione</option>
                     <?php foreach ($bxf as $bxfs): ?>
                        <option value="<?php echo $bxfs->getId(); ?>"><?php echo $bxfs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td></td>
               <td></td>
            </tr>
            <tr id="session">
               <td colspan="8">

                  <table cellspacing="0" cellpadding="0" style="width: 300px;border: 1px solid #F1F1F1">
                     <thead>
                     <tr>
                        <th colspan="5">
                     <h3 style="color:white">Datos de siembra</h3>
                        </th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <td>Cantidad</td>
                        <td><input type="text" id="cantidad" /></td>
                        <td>Operario</td>
                        <td>
                           <input type="text" id="operario" />
                           <input type="hidden" id="operario_" />
                           <input type="hidden" id="tipo"/>
                           <div id="operario_show">
                           </div>
                        </td>
                        <td>
                           <a href="#addTosession" id="addToSession" class="btn btn_black">&nbsp;&nbsp;Agregar</a>
                           <input type="hidden" id="idareaxbloque" />
<!--                           <input type="hidden" id="idbloque" />-->
                        </td>
                     </tr>
                     </tbody>
                  </table>
                  
                  <table cellspacing="0" cellpadding="0" style="width: 588px;" id="showSession">
                     
                  </table>
                  

               </td>
            </tr>
         </table>
         <div id="bloquesResult">

         </div>
      </div>
   </div>
</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script type="text/javascript" src="../js/calendario_k.js"></script>
<script type="text/javascript" src="functionCrear.js"></script>

