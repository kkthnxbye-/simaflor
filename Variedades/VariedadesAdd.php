<?php include '../includes/header.php'; ?>
<?php

$productos = new productos();
$productosDAO = new productosDAO();
$productoss = $productosDAO->gets();
$total = $productosDAO->total();

$colorDAO = new coloresDAO();
$color = new colores();
$colors = $colorDAO->gets();
$total2 = $colorDAO->total();

$breedersDAO = new breedersDAO();
$breeder = new breeders();
$breeders = $breedersDAO->gets();
print_r($breeders);
$total3 = $breedersDAO->total();

?>

<script>
   function validate(){
      if(document.getElementById('IDProducto').value == 0){
         alert('Por favor seleccione un producto');
         return false;
      }
      if(document.getElementById('IDColor').value == 0){
         alert('Por favor seleccione un color');
         return false;
      }
      if(document.getElementById('IDBreeder').value == 0){
         alert('Por favor seleccione un breeder');
         return false;
      }
      return true;
      
   }
</script>

<div id="content" class="xfluid">
    <div class="portlet x9">
        <div class="portlet-header"><h4>Agregar Variedades</h4></div>
        <div class="portlet-content">
           <form onsubmit="return validate()" action="../php/action/variedadesAdd.php" method="post" class="form label-inline" enctype="multipart/form-data">
                <div class="field">
                    <label for="fname">Producto</label>
                    <select name="IDProducto" id="IDProducto">
                       
                        <?php if ($total > 0):?>
                       <option value="0">Seleccione</option>
                        <?php foreach ($productoss as $productos) : ?>
                            <option value="<?= $productos->getId() ?>"><?= $productos->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
               <div class="field">
                    <label for="fname">Breeder</label>
                    <select name="IDBreeder" id="IDBreeder">
                        <?php if ($total3 > 0):?>
                       <option value="0">Seleccione</option>
                        <?php foreach ($breeders as $breeder_) : ?>
                       <option value="<?= $breeder_->getId() ?>"><?= $breeder_->getNombre(); ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                <div class="field">
                    <label for="fname">Color</label>
                    <select name="IDColor" id="IDColor">
                        <?php if ($total > 0):?>
                       <option value="0">Seleccione</option>
                        <?php foreach ($colors as $color) : ?>
                            <option value="<?= $color->getId() ?>"><?= $color->getNombre() ?></option>
                        <?php endforeach; ?>
                        <?php endif;?>    
                    </select>
                </div>
                <div class="field"><label for="lname">Codigo </label> <input id="codigo" name="codigo" size="50" type="text" class="medium" /></div>               
                <div class="field"><label for="lname">Nombre </label> <input id="nombre" name="nombre" size="50" type="text" class="medium" /></div>
                <div class="field"><label for="lname">Descripcion </label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"></textarea></div>
                <div class="field"><label for="lname">Foto </label> <input id="imagen" name="imagen" type="file" class="medium" /></div>               
<div class="field"><label for="lname">Habilitado </label> <input id="habilitado" name="habilitado" type="checkbox" class="medium" value="on" /></div>               
                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar</button>
                    <a href="VariedadesList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
