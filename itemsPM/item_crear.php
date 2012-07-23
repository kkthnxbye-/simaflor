<?php include '../includes/header.php'; ?>
<link rel="stylesheet" media="all" href="items.css" />
<?php

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

$pXf = $pXfDAO->getsbybuscar($_SESSION['fincaproduccion'], '','','');
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
               <td>Producto</td>
               <td>
                  <select id="producto">
                     <option value="">Seleccione</option>
                     <?php foreach($pXf as $pxf): ?>
                     <?php $p = $pDAO->getById($pxf->getIdProducto()); ?>
                     <option value="<?php echo $p->getId(); ?>"><?php echo $p->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Material Vegetal</td>
               <td>
                  <select id="vegetal">
                     <option value="">Seleccione</option>
                     <?php foreach($m as $ms): ?>
                     <option value="<?php echo $ms->getId(); ?>"><?php echo $ms->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Variedad</td>
               <td>
                  <select id="variedad"></select>
               </td>

               <td>Breeder</td>
               <td>
                  <select id="breeder">
                     <option value="">Seleccione</option>
                     <?php foreach($b as $bs): ?>
                     <option value="<?php echo $bs->getId(); ?>"><?php echo $bs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Proveedor</td>
               <td>
                  <input type="text" name="proveedor" id="proveedor" />
                  <input type="text" name="proveedor_" id="proveedor_" />
                  <div class="show">
                     Proveedor<br>
                     Proveedor<br>
                     Proveedor
                  </div>
               </td>

               <td>Cliente</td>
               <td>
                  <input type="text" name="cliente" id="cliente" />
                  <input type="text" name="cliente_" id="cliente_" />
                  <div class="show">
                     Clientes<br>
                     Clientes<br>
                     Clientes
                  </div>
               </td>

               <td>Alias</td>
               <td><input type="text" name="alias" id="alias" /></td>

               <td>Fecha Siembra </td>
               <td><input type="text" name="fechaSiembra" id="fechaSiembra" /></td>
            </tr>
            <tr>
               <td>Temporada</td>
               <td>
                  <select id="temporada">
                     <option value="">Seleccione</option>
                     <?php foreach($t as $ts): ?>
                     <option value="<?php echo $ts->getId(); ?>"><?php echo $ts->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Ciclo</td>
               <td>
                  <select id="ciclo">
                    <option value="">Seleccione</option>
                     <?php foreach($c as $cs): ?>
                     <option value="<?php echo $cs->getId(); ?>"><?php echo $cs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td>Bloques</td>
               <td>
                  <select id="bloques">
                     <option value="">Seleccione</option>
                     <?php foreach($bxf as $bxfs): ?>
                     <option value="<?php echo $bxfs->getId(); ?>"><?php echo $bxfs->getNombre(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </td>

               <td></td>
               <td>
                  <a href="" class="btn btn_black">&nbsp;&nbsp;Siguiente</a>
               </td>
            </tr>
         </table>
         
         <table>
            <tr>
               <td><strong>Bloque 1:</strong></td>
            </tr>
         </table>
         
         <table cellpadding="0" cellspacing="0" border="0">
            <thead>
               <tr>
                  <td colspan="6">
                     Camas
                  </td>
               </tr>
               <tr>
                  <th>Nombre</th>
                  <th>Capacidad</th>
                  <th>Q sembrada</th>
                  <th>% Sembrado</th>
                  <th>Q a sembrar</th>
                  <th>Acci&oacute;n</th>
               </tr>
            </thead>
            <tbody>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td><a href="" class="btn btn_black">&nbsp;&nbsp;Editar Siembra</a></td>
            </tbody>
         </table>
         
         <table cellpadding="0" cellspacing="0" border="0">
            <thead>
               <tr>
                  <td colspan="6">
                     Bancos
                  </td>
               </tr>
               <tr>
                  <th>Nombre</th>
                  <th>Capacidad</th>
                  <th>Q sembrada</th>
                  <th>% Sembrado</th>
                  <th>Q a sembrar</th>
                  <th>Acci&oacute;n</th>
               </tr>
            </thead>
            <tbody>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td><a href="" class="btn btn_black">&nbsp;&nbsp;Editar Siembra</a></td>
            </tbody>
         </table>
      </div>
   </div>
</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script type="text/javascript" src="../js/calendario_k.js"></script>
<script type="text/javascript" src="functions.js"></script>
