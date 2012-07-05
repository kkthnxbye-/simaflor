<?php

class remisionesxpedidosDAO{
   public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    
    function checkCode($no_remision){
       $sql="select * from remisionespm where noremision = '$no_remision'";
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        if($numregistros > 0){
           return 1;//bad
        }else{
           return 2;//good
        }
    }
    
    function save($id_pedido,$id_usuario,$no_remision,$fecha){
       $sql = "insert into remisionespm (idpedidopm,idusuario,noremision,fecha) values 
          ($id_pedido,$id_usuario,'$no_remision','$fecha')";
       
       $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveRemision): ' . mssql_get_last_message().'<br>'.$sql.'<br>';
            return false;
        }

        return true;
    }
}

?>
