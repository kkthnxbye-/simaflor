<?php

class documentosxpedidosDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($id_documento,$id_pedido,$id_usuario,$documento,$fecha){
        $sql="INSERT INTO documentosxpedidopm (IDTipoDocumentoPedidoPM,IDPedidoPM,IDUsuario,Documento,Fecha) 
        VALUES ($id_documento,$id_pedido,$id_usuario,'$documento','$fecha')";
        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveDocumentosxPedido): ' . mssql_get_last_message().'<br>'.$sql.'<br>';
            return false;
        }

        return true;
    }
    
    function getLastId() {
        $sql = 'SELECT MAX(ID) from documentosxpedidopm';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }
    
    function getAll($id_pedido){
        $sql="SELECT * FROM documentosxpedidopm WHERE IDPedidoPM = $id_pedido ORDER BY Documento";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $UsuariosXEmpresa = new documentosxpedidos();
        $UsuariosXEmpresa->setId_documentoxpedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setId_pedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setId_documento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setId_usuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setDocumento($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $UsuariosXEmpresa;
        }
        return $lista;
    }
    
    function update($documento,$id_documentoxpedido){
        $sql = "UPDATE documentosxpedidopm SET Documento = '$documento' WHERE ID = $id_documentoxpedido";
        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (updateDocumentosxPedido): ' . mssql_get_last_message().'<br>'.$sql;
            return false;
        }

        return true;
    }
    
    function delete($id){
        $sql = "DELETE from documentosxpedidopm WHERE ID = $id";
        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (deleteDocumentosxPedido): ' . mssql_get_last_message().'<br>'.$sql;
            return false;
        }

        return true;
    }
    
}

?>
