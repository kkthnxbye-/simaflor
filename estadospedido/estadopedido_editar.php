<?php
include '../includes/header.php';
$estadospedidoDAO = new estadospedidoDAO();
$estadopedido = $estadospedidoDAO->getById($_REQUEST['id']);
?>
<div id="content" class="xfluid">



    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] ?> / Editar</h4> 

            <div class="help"></div>



        </div>



        <div class="portlet-content">

            <br/> 





            <div class="portlet-content">


                <form onSubmit="return valida_cod()" action="../php/action/estadopedidoEdit.php" method="post" class="form label-inline">


                    <div class="field"><label for="lname">Nombre <strong style="color: red">*</strong></label> <input id="nombre" name="nombre" size="50" type="text" class="medium" value="<?php echo $estadopedido->getNombre() ?>" required/></div>

                    <br />
                    <div class="buttonrow">
                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />

                        <button class="btn btn-grey">Guardar</button>

                        <button class="btn btn-black" type="button" onclick="location.href='lista.php'">Cancelar</button>

                    </div>

                </form>



                <br /><br />

                <br /><br />



            </div>



        </div>

    </div>







</div> <!-- #content -->

<?php include '../includes/footer.php'; ?>