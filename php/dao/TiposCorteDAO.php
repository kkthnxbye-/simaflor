<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TiposCorteDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposCorte) {
        $TiposCorte = new TiposCorte();
        $TiposCorte = $newTiposCorte;
        $sql = "insert into TiposCorte
                    (IDProducto,Codigo,Nombre,Descripcion,Habilitado)
                    values (
                     \"". $TiposCorte->getIdProducto() . "\",
                    \"" . $TiposCorte->getCodigo() . "\",
		\"" . $TiposCorte->getNombre() . "\",
		\"" . $TiposCorte->getDescripcion() . "\",
                    " . $TiposCorte->getHabilitado() . "                        
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposCorte): ' . mssql_get_last_message().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TiposCorte WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposCorte = new TiposCorte();
        $TiposCorte->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposCorte;
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposCorte WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposCorte = new TiposCorte();
        $TiposCorte->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposCorte;
    }

    function gets($campo,$tipoBusqueda,$valor) {

        $sql = 'SELECT * from TiposCorte ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where idProducto like '%".$valor."%' or Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where idProducto = '".$valor."' or Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
        $TiposCorte = new TiposCorte();
        $TiposCorte->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposCorte->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposCorte;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposCorte WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newTiposCorte) {
        $TiposCorte = new TiposCorte();
        $TiposCorte = $newTiposCorte;

        $sql = "UPDATE
                    TiposCorte
                    SET
                        IDProducto =
                        \"" . $TiposCorte->getIdProducto() . "\",
                        Codigo =
                        \"" . $TiposCorte->getCodigo() . "\",
                        Nombre =
                        \"" . $TiposCorte->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposCorte->getDescripcion() . "\",
                       Habilitado =
                        \"" . $TiposCorte->getHabilitado() . "\"
                    WHERE ID =
                    " . $TiposCorte->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);;
        if (!$result) {
            echo 'Ooops (updateTiposCorte): ' . mssql_get_last_message().'<br>'.$sql;
            return false;
        }

        return true;
    }

    function total($campo,$tipoBusqueda,$valor) {

            $sql = 'select count(*) from TiposCorte ';

            if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where idProducto like '%".$valor."%' or Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where idProducto = '".$valor."' or Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
