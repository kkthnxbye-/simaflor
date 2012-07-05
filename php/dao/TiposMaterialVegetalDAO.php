<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposMaterialVegetalDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposMaterialVegetal) {
        $TiposMaterialVegetal = new TiposMaterialVegetal();
        $TiposMaterialVegetal = $newTiposMaterialVegetal;
        $sql = "insert into TiposMaterialVegetal
                    (Nombre)
                    values(
                    \"" . $TiposMaterialVegetal->getNombre() . "\"                      
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposMaterialVegetal): ' . mysql_error() . '<br>' . $sql;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposMaterialVegetal WHERE Codigo = "' . $id . '" ';

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

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposMaterialVegetal ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Nombre like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Nombre = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= "where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= "where " . $campo . " = '" . $valor . "'";
                }
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

        $sql = "UPDATE
                    TiposMaterialVegetal
                    SET
                        Nombre =
                        \"" . $TiposMaterialVegetal->getNombre() . "\"
                    WHERE ID =
                    " . $TiposMaterialVegetal->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposMaterialVegetal): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposMaterialVegetal ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Nombre like '%" . $valor . "%' ";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Nombre = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= "where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= "where " . $campo . " = '" . $valor . "'";
                }
            }
        }

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>