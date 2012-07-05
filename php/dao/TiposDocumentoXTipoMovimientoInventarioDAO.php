<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TiposDocumentoXTipoMovimientoInventarioDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposDocumentoXTipoMovimientoInventario) {
        $TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
        $TiposDocumentoXTipoMovimientoInventario = $newTiposDocumentoXTipoMovimientoInventario;
        $sql = "insert into TiposDocumentoXTipoMovimientoInventario
                    (IDTipoMovimientoInventario,IDTipoDocumento)
                    values (
                    '" . $TiposDocumentoXTipoMovimientoInventario->getTipoMovimientoInventario() . "',
                     " . $TiposDocumentoXTipoMovimientoInventario->getTipoDocumento() . "                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposDocumentoXTipoMovimientoInventario): <br>' . $sql.'<br>'. mssql_get_last_message();
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TiposDocumentoXTipoMovimientoInventario WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
        $TiposDocumentoXTipoMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoXTipoMovimientoInventario->setTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoXTipoMovimientoInventario->setTipoDocumento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposDocumentoXTipoMovimientoInventario;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposDocumentoXTipoMovimientoInventario ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where IDTipoMovimientoInventario like '%" . $valor . "%' or IDTipoDocumento like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where IDTipoMovimientoInventario = '" . $valor . "' or IDTipoDocumento = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
            $TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
        $TiposDocumentoXTipoMovimientoInventario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoXTipoMovimientoInventario->setTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoXTipoMovimientoInventario->setTipoDocumento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $TiposDocumentoXTipoMovimientoInventario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposDocumentoXTipoMovimientoInventario WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposDocumentoXTipoMovimientoInventario) {
        $TiposDocumentoXTipoMovimientoInventario = new TiposDocumentoXTipoMovimientoInventario();
        $TiposDocumentoXTipoMovimientoInventario = $newTiposDocumentoXTipoMovimientoInventario;

        $sql = "UPDATE
                    TiposDocumentoXTipoMovimientoInventario
                    SET
                        IDTipoMovimientoInventario =
                        \"" . $TiposDocumentoXTipoMovimientoInventario->getTipoMovimientoInventario() . "\",
                        IDTipoDocumento =
                        \"" . $TiposDocumentoXTipoMovimientoInventario->getTipoDocumento() . "\"
                    WHERE ID =
                    " . $TiposDocumentoXTipoMovimientoInventario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposDocumentoXTipoMovimientoInventario): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposDocumentoXTipoMovimientoInventario ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where IDTipoMovimientoInventario like '%" . $valor . "%' or IDTipoDocumento like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where IDTipoMovimientoInventario = '" . $valor . "' or IDTipoDocumento = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
