<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposParametrosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposParametros) {
        $TiposParametros = new TiposParametros();
        $TiposParametros = $newTiposParametros;
        $sql = "insert into TiposParametros
                    (Nombre,Descripcion)
                    values(
					\"" . $TiposParametros->getNombre() . "\",
					\"" . $TiposParametros->getDescripcion() . "\"                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposParametros): ' . mysql_error() . '<br>' . $sql;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TiposParametros WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposParametros = new TiposParametros();
        $TiposParametros->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposParametros->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposParametros->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposParametros;
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposParametros WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposParametros = new TiposParametros();
        $TiposParametros->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposParametros->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposParametros->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposParametros;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposParametros';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= " where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= " where " . $campo . " = '" . $valor . "'";
                }
            }
        }
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $TiposParametros = new TiposParametros();
            $TiposParametros->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposParametros->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposParametros->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposParametros;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposParametros WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposParametros) {
        $TiposParametros = new TiposParametros();
        $TiposParametros = $newTiposParametros;

        $sql = "UPDATE
                    TiposParametros
                    SET
                        Nombre =
                        \"" . $TiposParametros->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposParametros->getDescripcion() . "\"
                    WHERE ID =
                    " . $TiposParametros->getId() . "
                    ;";
        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (updateTiposParametros): ' . mssql_get_last_message(). " ". $sql;
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposParametros ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
