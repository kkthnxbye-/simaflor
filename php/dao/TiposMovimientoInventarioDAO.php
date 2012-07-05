<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposMovimientoInventarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposMovimientoInventario) {
        $TiposMovimientoInventario = new TiposMovimientoInventario();
        $TiposMovimientoInventario = $newTiposMovimientoInventario;
        
        $sql = "insert into TiposMovimientoInventarioPM
                    (ID,Codigo,Nombre,Suma,Descripcion,Habilitado)
                    values(
                    " . $TiposMovimientoInventario->getId() . ",
                    '" . $TiposMovimientoInventario->getCodigo() . "',
                    '" . $TiposMovimientoInventario->getNombre() . "' , 
                    " . $TiposMovimientoInventario->getSuma() . ",
                    '" . $TiposMovimientoInventario->getDescripcion() . "',
                    " . $TiposMovimientoInventario->getHabilitado() . "   
	)";
        

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposMovimientoInventario): ' . mssql_get_last_message() . '<br>' . $sql;
            return false;
        }

        return true;
    }

   
    function getLastId() {
        $sql = 'select MAX(ID) from TiposMovimientoInventarioPM';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposMovimientoInventarioPM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposMovimientoInventario = new TiposMovimientoInventario();
        $TiposMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setSuma($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposMovimientoInventario;
    }

    function getById($id) {

        $sql = 'SELECT * from TiposMovimientoInventarioPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposMovimientoInventario = new TiposMovimientoInventario();
        $TiposMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setSuma($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposMovimientoInventario;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposMovimientoInventarioPM';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%' or suma like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "' or suma = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= " where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= "where " . $campo . " = '" . $valor . "'";
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
            $TiposMovimientoInventario = new TiposMovimientoInventario();
            $TiposMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventario->setSuma($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposMovimientoInventario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $TiposMovimientoInventario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposMovimientoInventarioPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposMovimientoInventario) {
        $TiposMovimientoInventario = new TiposMovimientoInventario();
        $TiposMovimientoInventario = $newTiposMovimientoInventario;

        $sql = "UPDATE
                    TiposMovimientoInventarioPM
                    SET
                    Codigo =
                        \"" . $TiposMovimientoInventario->getCodigo() . "\" ,    
                        Nombre =
                        \"" . $TiposMovimientoInventario->getNombre() . "\",
                    Suma =
                        \"" . $TiposMovimientoInventario->getSuma() . "\",
                    Descripcion =
                        \"" . $TiposMovimientoInventario->getDescripcion() . "\",
                    Habilitado =
                        \"" . $TiposMovimientoInventario->getHabilitado() . "\"        
                    WHERE ID =
                    " . $TiposMovimientoInventario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposMovimientoInventario): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposMovimientoInventarioPM ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%' or suma like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "' or suma = '" . $valor . "'";
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
