<?php
include '../includes/header.php';

$gruposUsuario = new gruposUsuario();
$gruposUsuarioDAO = new gruposUsuarioDAO();
$gruposUsuarios = $gruposUsuarioDAO->gets();
$total = $gruposUsuarioDAO->total();
?>

<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?= $_SESSION['url_']; ?> / Nuevo</h4></div>
        <div class="portlet-content">
            <form  action="../php/action/UsuariosAdd.php" method="post" class="form label-inline">
                <div class="field">
                    <label for="fname">Grupo de Usuario <strong style="color: red">*</strong></label>
                    <select name="idGrupoUsuario" id="idGrupoUsuario">
                        <?php if ($total > 0): ?>
                            <option value="0">Seleccione</option>
                            <?php foreach ($gruposUsuarios as $gruposUsuario) : ?>
                                <option value="<?= $gruposUsuario->getId() ?>" <?php if($_GET['i'] == $gruposUsuario->getId()){echo "selected";}?>><?= $gruposUsuario->getNombre() ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>    
                    </select>
                </div>

                <div class="field"><label for="lname">Login <strong style="color: red">*</strong></label> <input id="login" name="login" size="50" type="text" class="medium" value="<?=$_GET['l']?>" required/></div>               
                <div class="field"><label for="lname">Contrase&ntilde;a <strong style="color: red">*</strong></label> <input id="contrasena" name="contrasena" size="50" type="password" class="medium" required /></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?=$_GET['n']?>" required/></div>               
                <div class="field"><label for="lname">E-mail <strong style="color: red">*</strong></label> <input id="email" name="email" size="50" type="email" class="medium"  value="<?=$_GET['e']?>" required/></div>               
                <div class="field"><label for="lname">Telefono <strong style="color: red">*</strong></label> <input id="telefono" name="telefono" size="50" type="text" class="medium" value="<?=$_GET['t']?>" required/></div>
                <div class="field"><label for="lname">Habilitado </label> <input id="habi" name="habi" size="50" type="checkbox" class="medium"  value="on"  <?php if($_GET['h'] == "on"){echo "checked";}?> /></div>               

                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar</button>
                    <a href="UsuariosList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>

</div>
<?php include '../includes/footer.php'; ?>
