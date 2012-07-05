<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposAreaPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposAreaPM) {
        $TiposAreaPM = new TiposAreaPM();
        $TiposAreaPM = $newTiposAreaPM;
        $sql = "insert into TiposAreaPM
                    (Nombre,Descripcion)
                    values (
					'" . $TiposAreaPM->getNombre() . "',
					'" . $TiposAreaPM->getDescripcion() . "'                       
	);";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposAreaPM):<br>' . $sql;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposAreaPM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposAreaPM = new TiposAreaPM();
        $TiposAreaPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposAreaPM;
    }

    function getById($id) {

        $sql = 'SELECT * from TiposAreaPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposAreaPM = new TiposAreaPM();
        $TiposAreaPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposAreaPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposAreaPM;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposAreaPM ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where  Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
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
            $TiposAreaPM = new TiposAreaPM();
            $TiposAreaPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposAreaPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposAreaPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposAreaPM;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposAreaPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposAreaPM) {
        $TiposAreaPM = new TiposAreaPM();
        $TiposAreaPM = $newTiposAreaPM;

        $sql = "UPDATE
                    TiposAreaPM
                    SET
                        Nombre =
                        \"" . $TiposAreaPM->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposAreaPM->getDescripcion() . "\"
                    WHERE ID =
                    " . $TiposAreaPM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposAreaPM):<br> ' . $sql;
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposAreaPM ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where  Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
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
