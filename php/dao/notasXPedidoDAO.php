<?php

class NotasXPedidoDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }


    function getNotasXPedidoAll($idPedido) {

        $sql = "SELECT * from dbo.NotasXPedidoPM WHERE IDPedidoPM = $idPedido";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $revisiones = new NotasXPedido();
        $revisiones->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdPedidoPm($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setNota($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $revisiones;
        }
        return $lista;
    }


    function saveNota($objNota) {

        $newNota = new NotasXPedido();
        $newNota = $objNota;

        $sql = "INSERT INTO dbo.NotasXPedidoPM 
                (IDPedidoPM,IDVariedad,IDUsuario,FechaRegistro,Nota) 
                VALUES (
                " . $newNota->getIdPedidoPm() . ",
                " . $newNota->getIdVariedad() . ",
                " . $newNota->getIdUsuario() . ",
                '" . $newNota->getFechaRegistro() . "',
                '" . $newNota->getNota() . "'
                ) ";
        

        $result = $this->daoConnection->consulta($sql);

        if (!$result) {
            echo 'Ooops (saveNotas): ' . mssql_get_last_message() . '<br>' . $sql . '<br>';
            return false;
        }

        return true;
    }
    
    
    function deleteNotas($id){
      $sql = "DELETE FROM NotasXPedidoPM WHERE ID = ".$id;
      return $result = $this->daoConnection->consulta($sql);
   }
   

}

?>
