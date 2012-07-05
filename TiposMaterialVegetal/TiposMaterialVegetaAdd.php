<?php include '../includes/header.php'; ?>
<div id="content" class="xfluid">
    <div class="portlet x9">
        <div class="portlet-header"><h4>Agregar TiposMateriaVegetal</h4></div>
        <div class="portlet-content">
            <form onSubmit="return valida_cod()" action="../php/action/TiposMateriaVegetalAdd.php" method="post" class="form label-inline">
                <div class="field"><label for="fname">Codigo </label> <input id="codigo" name="codigo" size="50" type="text" class="medium" /></div>
                <div class="field"><label for="lname">Nombre </label> <input id="nombre" name="nombre" size="50" type="text" class="medium" /></div>               
                <div class="field"><label for="description">Descripcion</label> <textarea rows="7" cols="50" name="descripcion" id="descripcion"></textarea></div>
                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Agregar TiposMateriaVegetal</button>
                    <a href="TiposMateriaVegetalList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>
    
</div>
<?php include '../includes/footer.php'; ?>
