<?php include '../includes/header.php'; ?>

<div id="content" class="xfluid">

    <div class="portlet x12">

        <div class="portlet-header"><h4><?= $_SESSION['url_'] . " / Facturar" ?></h4>
        </div>

        <div class="portlet-content">

            <div class="portlet x12">
                <div id="div_list_detalle_edit"></div>
            </div>

        </div>

    </div> 

    <script>



        setTimeout("carga_lista_detalle_edit()","1000");

        function carga_lista_detalle_edit(){
            $.ajax({
                url: "lista_add.php",
                type: "POST",
                data: {
                    id : <?= $_GET['id']; ?>,
                    idUsuario : <?= $usuario->getId() ?>
                },
                success: function(msg){
                    $("#div_list_detalle_edit").html(msg); 
                    
                }
            });
        }

        
                    
    </script>
