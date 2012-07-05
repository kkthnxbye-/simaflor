<?php include '../includes/header.php'; ?>
<?php

$productos = new productos();
$productosDAO = new productosDAO();
$productoss = $productosDAO->gets();
$total = $productosDAO->total();
?>
<script>
   function validateSelect(){
      if(document.getElementById('idProducto').value == 0){
          window.location="TiposCorteAdd.php?c="+document.getElementById('codigo').value+"&n="+document.getElementById('nombre').value+"&d="+document.getElementById('descripcion').value+"&inf";
         return false;
      }
      return true;
   }
</script>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?php echo $_SESSION['url_']; ?> / Nuevo</h4></div>
        <div class="portlet-content">
           <form action="../php/action/TiposCortesAdd.php" method="post" class="form label-inline" 
                 onsubmit="return validateSelect();">
                <div class="field">
                    <label for="fname">Producto <strong style="color: red">*</strong></label>
                    <select name="idProducto" id="idProducto" required>
                        <?php if ($total > 0):?>
                        <option value="0">Seleccione</option>
                        <?php foreach ($productoss as $productos) : ?>
                            <option value="<?= $productos->getId() ?>" <?php if($productos->getId() == $_GET['i']){echo "selected";}?>><?= $productos->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
               <div class="field"><label for="fname">Codigo <strong style="color: red">*</strong></label> <input id="codigo" name="codigo" size="50" type="text" class="medium" value="<?=$_GET['c'];?>" required/></div>
               <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n'];?>" required/></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"><?=$_GET['d'];?></textarea></div>
                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar</button>
                    <a href="TiposCorteList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>

</div>
<?php include '../includes/footer.php'; ?>
