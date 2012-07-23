<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MovimientosInventarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($objMovimientoInventario) {

        $newMovimientoInventario = new movimientosInventarioPM();
        $newMovimientoInventario = $objMovimientoInventario;

        $querty = "INSERT INTO MovimientosInventarioPM
                    (IDInventarioPM,IDTipoMovimientoInventarioPM,IDCliente,Cantidad,FechaRegistro,IDUsuario,IDDocumentoInventarioPM,Habilitado)
                    VALUES(
                    " . $newMovimientoInventario->getIdInventarioPM() . ",
                    " . $newMovimientoInventario->getIdTipoMovimientoInventarioPM() . ",
                    " . $newMovimientoInventario->getIdCliente() . ",
                    " . $newMovimientoInventario->getCantidad() . ",
                    '" . $newMovimientoInventario->getFechaRegistro() ."',
                    " . $newMovimientoInventario->getIdUsuario() . ",
                    " . $newMovimientoInventario->getIdDocumentoInventarioPM() . ",
                    " . $newMovimientoInventario->getHabilitado() . ");";
        
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = "SELECT * from dbo.MovimientosInventarioPM WHERE ID = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $newMovimientoInventario = new movimientosInventarioPM();
        $newMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setIdDocumentoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newMovimientoInventario;
    }
    
    function getByIdInventario($id) {

        $sql = "SELECT * from dbo.MovimientosInventarioPM WHERE IdInventarioPM = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        $lista = array();
        
        if ($numregistros == 0) {
            return $lista;
        }
        
        

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newMovimientoInventario = new movimientosInventarioPM();
            $newMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdDocumentoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $newMovimientoInventario;
        }
        return $lista;
    }

    function gets() {

        $sql = 'SELECT * from dbo.MovimientosInventarioPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newMovimientoInventario = new movimientosInventarioPM();
            $newMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdDocumentoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $newMovimientoInventario;
        }
        return $lista;
    }
    
    function getsfiltro($campo,$tipo,$valor,$fincaproduccion,$tipoMov,$fecha,$cliente) {

        $sql = 'SELECT m.id,m.idinventariopm,m.idtipomovimientoinventariopm,m.idcliente,
m.cantidad,m.fecharegistro,m.idusuario,m.iddocumentoinventariopm,m.habilitado,
t.id,i.id,t.suma
               FROM MovimientosInventarioPM as m,
                    InventariosPM as i,
                    TiposMovimientoInventarioPM as t
               WHERE i.id = m.idInventarioPM AND 
                     t.id = m.IDTipoMovimientoInventarioPM AND
                     t.suma = 0';
        
        if($tipoMov != ''){
           $sql.=' AND m.IDTipoMovimientoInventarioPM = '.$tipoMov.' ';
        }
        
        if($fecha != ''){
           $fecha = str_replace('/','-',$fecha);
           $sql.=" AND m.FechaRegistro = '$fecha' ";
        }
        
        if($cliente != ''){
           $sql.=' AND m.IDCliente = '.$cliente.' ';
        }
        
        if($fincaproduccion != ''){
           $sql.=' AND i.IDFincaProduccion = '.$fincaproduccion;
        }
        
        if($campo == "todos"){
           
        }else{
           if($tipo == "%"){
              $sql.=' AND '.$campo.' = '.$valor;
           }else{
              
           }
        }
        
        //echo $sql;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newMovimientoInventario = new movimientosInventarioJoin();
            $newMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdDocumentoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setIdInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newMovimientoInventario->setSuma($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            
            $lista[$i] = $newMovimientoInventario;
        }
        return $lista;
    }
    
    function delete($id) {

        $sql = "Delete from dbo.MovimientosInventarioPM WHERE ID = $id";

        $this->daoConnection->consulta($sql);
    }


    function total() {

        $sql = "select count(*) from dbo.MovimientosInventarioPM";


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    function updateSome($idDocumentoInventario,$newId){
       $sql = "UPDATE MovimientosInventarioPM SET IDDocumentoInventarioPM = ".$newId." WHERE IDDocumentoInventarioPM = ".$idDocumentoInventario;
       $this->daoConnection->consulta($sql);
    }
    
    function update($campo,$valor,$id){
       $sql = "UPDATE MovimientosInventarioPM SET $campo = ".$valor." WHERE ID = ".$id;
       $this->daoConnection->consulta($sql);
    }

}

?>