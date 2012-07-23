<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposMovimientoInventarioXFincaDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($IDFinca,$IDTipoMovimiento,$EsPorDefecto,$Consecutivo) {
        
        $querty = "insert into TiposMovimientoInventarioPMXFinca
                    (IDFinca,IDTipoMovimiento,EsPorDefecto,Consecutivo)
                    values($IDFinca,$IDTipoMovimiento,$EsPorDefecto,$Consecutivo)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveTiposMovimientoInventarioXFinca): ' . mssql_get_last_message() . '<br>' . $querty.'<br><br>';
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TiposMovimientoInventarioPMXFinca WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
        $TiposMovimientoInventarioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setIdTipoMovimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setEsPorDefecto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposMovimientoInventarioXFinca;
    }
    
    function getByIdTipoMovimiento($id,$idFinca) {

        $sql = "SELECT * from TiposMovimientoInventarioPMXFinca WHERE IDTipoMovimiento = $id AND IDFinca = $idFinca";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
        $TiposMovimientoInventarioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setIdTipoMovimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setEsPorDefecto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventarioXFinca->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposMovimientoInventarioXFinca;
    }
    
    
    function getByIdFinca($idFinca) {

        $sql = "SELECT * from TiposMovimientoInventarioPMXFinca WHERE IDFinca = $idFinca";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
            $TiposMovimientoInventarioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setIdTipoMovimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setEsPorDefecto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposMovimientoInventarioXFinca;
        }
        return $lista;
    }

    function Confirmas($finca, $tipo) {
        $sql = "SELECT * from TiposMovimientoInventarioPMXFinca WHERE IDFinca = $finca and  IDTipoMovimiento = $tipo";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return false;
        } else {
            return true;
        }
    }

    function gets() {

        $sql = 'SELECT * from TiposMovimientoInventarioPMXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
            $TiposMovimientoInventarioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setIdTipoMovimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setEsPorDefecto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventarioXFinca->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposMovimientoInventarioXFinca;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposMovimientoInventarioPMXFinca WHERE IDFinca = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposMovimientoInventarioXFinca) {
        $TiposMovimientoInventarioXFinca = new TiposMovimientoInventarioXFinca();
        $TiposMovimientoInventarioXFinca = $newTiposMovimientoInventarioXFinca;

        $querty = "UPDATE
                    TiposMovimientoInventarioPMXFinca
                    SET
                        IDFinca =
                        \"" . mysql_real_escape_string($TiposMovimientoInventarioXFinca->getIdFinca()) . "\",
                        IDTipoMovimiento =
                        \"" . mysql_real_escape_string($TiposMovimientoInventarioXFinca->getIdTipoMovimiento()) . "\",
                       Consecutivo =
                       \"" . mysql_real_escape_string($TiposMovimientoInventarioXFinca->getConsecutivo()) . "\"
                    WHERE ID =
                    " . mysql_real_escape_string($TiposMovimientoInventarioXFinca->getId()) . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposMovimientoInventarioXFinca): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from TiposMovimientoInventarioPMXFinca';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>