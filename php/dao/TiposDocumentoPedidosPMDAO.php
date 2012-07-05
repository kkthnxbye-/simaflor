<?php

class TiposDocumentoPedidosPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposDocumentoPedidosPM) {
        $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
        $TiposDocumentoPedidosPM = $newTiposDocumentoPedidosPM;
        $sql = "insert into TiposDocumentoPedidosPM
                    (Codigo,Nombre,Descripcion,Habilitado)
                    values (
                    '" . $TiposDocumentoPedidosPM->getCodigo() . "',
					'" . $TiposDocumentoPedidosPM->getNombre() . "',
					'" . $TiposDocumentoPedidosPM->getDescripcion() . "',
                     " . $TiposDocumentoPedidosPM->getHabilitado() . "                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposDocumentoPedidosPM): <br>' . $sql.'<br>'. mssql_get_last_message();
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposDocumentoPedidosPM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
        $TiposDocumentoPedidosPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposDocumentoPedidosPM;
    }

    function getById($id) {

        $sql = "SELECT * from TiposDocumentoPedidosPM WHERE ID = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        //echo $sql;
        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
        $TiposDocumentoPedidosPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposDocumentoPedidosPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposDocumentoPedidosPM;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = "SELECT * from TiposDocumentoPedidosPM ";

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
            $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
            $TiposDocumentoPedidosPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposDocumentoPedidosPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposDocumentoPedidosPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposDocumentoPedidosPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposDocumentoPedidosPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposDocumentoPedidosPM;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposDocumentoPedidosPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposDocumentoPedidosPM) {
        $TiposDocumentoPedidosPM = new TiposDocumentoPedidosPM();
        $TiposDocumentoPedidosPM = $newTiposDocumentoPedidosPM;

        $sql = "UPDATE
                    TiposDocumentoPedidosPM
                    SET
                        Codigo =
                        \"" . $TiposDocumentoPedidosPM->getCodigo() . "\",
                        Nombre =
                        \"" . $TiposDocumentoPedidosPM->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposDocumentoPedidosPM->getDescripcion() . "\",
                       Habilitado =
                        \"" . $TiposDocumentoPedidosPM->getHabilitado() . "\"
                    WHERE ID =
                    " . $TiposDocumentoPedidosPM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposDocumentoPedidosPM): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposDocumentoPedidosPM ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
