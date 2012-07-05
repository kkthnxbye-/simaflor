<?php
include '../includes/header.php';
$id = $_REQUEST['id'];
$gruposUsuario = new gruposUsuario();
$gruposUsuarioDAO = new gruposUsuarioDAO();
$gruposUsuarios = $gruposUsuarioDAO->gets();
$total = $gruposUsuarioDAO->total();
$usuariosDAO = new UsuariosDAO();
$usuario = $usuariosDAO->getById($id);
?>
<div id="content" class="xfluid">
    <div class="portlet x12">
        <div class="portlet-header"><h4><?= $_SESSION['url_']; ?> / Editar</h4></div>
        <div class="portlet-content">
            <form action="../php/action/UsuariosEdit.php" method="post" class="form label-inline">
                <div class="field">
                    <label for="fname">grupoUsuario <strong style="color: red">*</strong></label>
                    <input type="hidden"  name="id" id="id" value="<?php echo $id; ?>" />
                    <select name="idGrupoUsuario" id="idGrupoUsuario">
                        <?php if ($total > 0): ?>
                            <?php foreach ($gruposUsuarios as $gruposUsuario) : ?>
                                <?php
                                $sel = "";
                                if ($gruposUsuario->getId() == $usuario->getIdGrupoUsuario()) {
                                    $sel = "selected";
                                }
                                ?>
                                <option value="<?= $gruposUsuario->getId() ?>" <?php echo $sel; ?>><?= $gruposUsuario->getNombre() ?></option>
    <?php endforeach; ?>
<?php endif; ?>    
                    </select>
                </div>

                <div class="field"><label for="lname">Login <strong style="color: red">*</strong></label> <input id="login" name="login" size="50" type="text" class="medium"  value="<?php echo $usuario->getLogin(); ?>" required/></div>               
                <div class="field"><label for="lname">Contrase&ntilde;a </label> <input id="contrasena" name="contrasena" size="50" type="password" class="medium" /></div>
                <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium"  value="<?php echo $usuario->getNombre(); ?>" required/></div>               
                <div class="field"><label for="lname">E-mail <strong style="color: red">*</strong></label> <input id="email" name="email" size="50" type="email" class="medium" value="<?php echo $usuario->getEmail(); ?>" required/></div>               
                <div class="field"><label for="lname">Telefono <strong style="color: red">*</strong></label> <input id="telefono" name="telefono" size="50" type="tel" class="medium" value="<?php echo $usuario->getTelefono(); ?>" required/></div> 
                <div class="field"><label for="lname">Habilitado </label> <input id="habi" name="habi" size="50" type="checkbox" class="medium" <?php if ($usuario->getHabilitado() == "1") { ?> checked="checked" <?php } ?> value="on" /></div>              

                <br />
                <div class="buttonrow">
                    <button class="btn btn-grey">Guardar </button>
                    <a href="UsuariosList.php" class="btn btn-black">Cancelar</a>
                </div>
            </form>
            <br /><br />
            <br /><br />
        </div>
    </div>

</div>
<?php include '../includes/footer.php'; ?>
