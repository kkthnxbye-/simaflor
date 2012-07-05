<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Tipos2MaterialVegetalDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposMaterialVegetal) {
        $TiposMaterialVegetal = new TiposMaterialVegetal();
        $TiposMaterialVegetal = $newTiposMaterialVegetal;
        $querty = "insert into TiposMaterialVegetal
                    (nombre)
                    values(
                    \"" . mysql_real_escape_string($TiposMaterialVegetal->getNombre()) . "\"                      
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposMaterialVegetal): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TiposMaterialVegetal WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposMaterialVegetal = new TiposMaterialVegetal();
        $TiposMaterialVegetal->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMaterialVegetal->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposMaterialVegetal;
    }

    function gets() {

        $sql = 'SELECT * from TiposMaterialVegetal';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $TiposMaterialVegetal = new TiposMaterialVegetal();
        $TiposMaterialVegetal->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMaterialVegetal->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $TiposMaterialVegetal;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposMaterialVegetal WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposMaterialVegetal) {
        $TiposMaterialVegetal = new TiposMaterialVegetal();
        $TiposMaterialVegetal = $newTiposMaterialVegetal;

        $querty = "UPDATE
                    TiposMaterialVegetal
                    SET
                        nombre =
                        \"" . mysql_real_escape_string($TiposMaterialVegetal->getNombre()) . "\"
                    WHERE ID =
                    " . mysql_real_escape_string($TiposMaterialVegetal->getId()) . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposMaterialVegetal): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from TiposMaterialVegetal;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>