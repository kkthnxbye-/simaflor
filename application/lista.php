<?php
include '../includes/header.php';
include_once '../php/dao/daoConnection.php';
include_once '../php/dao/applicationDAO.php';
include_once '../php/entities/application.php';

$aDAO = new applicationDAO();

$a = new Application();
$a = $aDAO->get();

?>
<div id="content" class="xfluid">

   <div class="portlet x12">

      <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?></h4> 

         <div class="help">
            <?php if ($archiv_ayuda != ""): ?>
               <a target="_blank" href="../pdf_ayuda/<?= $archiv_ayuda ?>" class="btn_black"><div class="icon_botn"><img src="../images/icon_help.png" width="22" height="23" /></div>Ayuda</a>
            <? endif; ?> 
         </div>



      </div>



      <div class="portlet-content">


         <div class="user_tit"></div>
         <div class="btn_right">

            <button style="float: left;margin-right: 5px" 
                    class="btn btn-grey" onclick="change();">
               Nuevo
            </button>

            <a href="excel.php" class="btn_editar">
               <div class="icon_botn">
                  <img src="../images/icon_export.png" width="22" height="23" /></div> 
               Exportar (CSV)
            </a>



            <br/><br/>

         </div>	
         
         
         <table cellpadding="0" cellspacing="0" border="0" id="example2_" style="width: 500px">
               <tr>
                  <th bgcolor="#204722" style="color:white;font-weight: bold">Variable</th>
                  <th bgcolor="#204722" style="color:white;font-weight: bold">Valor</th>
                  <th bgcolor="#204722" style="color:white;font-weight: bold">Acci&oacute;n</th>
               </tr>
               <tr>
                  <td><strong style="color:red">*</strong><input type="text" id="variableE" /></td>
                  <td><strong style="color:red">*</strong><input type="text" id="valorE" /></td>
                  <td>
                     <input type="hidden" id="idE" />
                     <button class="btn_editar" id="editarButton" onclick="return editar_2()">&nbsp;&nbsp;&nbsp;Editar</button>
                     <button class="btn_editar" id="nuevoButton" onclick="return nuevo()">&nbsp;&nbsp;&nbsp;Nuevo</button>
                  </td>
               </tr>
         </table>
         
         
         <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Variable</th>
                  <th>Valor</th>
                  <th>Acci&oacute;n</th>
               </tr>
            </thead>
            <tbody id="data"></tbody>
         </table>
      </div>
   </div>
</div> <!-- #content -->
<?php include '../includes/footer.php'; ?>
<script type="text/javascript" src="functions.js"></script>