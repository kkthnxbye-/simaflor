<?php

class TiposUnidadesPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposUnidadesPM) {
        $TiposUnidadesPM = new TiposUnidadesPM();
        $TiposUnidadesPM = $newTiposUnidadesPM;
        $sql = "insert into TiposUnidadesPM
                    (Codigo,Nombre,Descripcion,Habilitado)
                    values (
                    '" . $TiposUnidadesPM->getCodigo() . "',
					'" . $TiposUnidadesPM->getNombre() . "',
					'" . $TiposUnidadesPM->getDescripcion() . "',
                     " . $TiposUnidadesPM->getHabilitado() . "                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposUnidadesPM): <br>' . $sql.'<br>'. mssql_get_last_message();
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposUnidadesPM WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposUnidadesPM = new TiposUnidadesPM();
        $TiposUnidadesPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposUnidadesPM;
    }

    function getById($id) {

        $sql = 'SELECT * from TiposUnidadesPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposUnidadesPM = new TiposUnidadesPM();
        $TiposUnidadesPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposUnidadesPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposUnidadesPM;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposUnidadesPM ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
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
            $TiposUnidadesPM = new TiposUnidadesPM();
            $TiposUnidadesPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposUnidadesPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposUnidadesPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposUnidadesPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposUnidadesPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposUnidadesPM;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposUnidadesPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposUnidadesPM) {
        $TiposUnidadesPM = new TiposUnidadesPM();
        $TiposUnidadesPM = $newTiposUnidadesPM;

        $sql = "UPDATE
                    TiposUnidadesPM
                    SET
                        Codigo =
                        \"" . $TiposUnidadesPM->getCodigo() . "\",
                        Nombre =
                        \"" . $TiposUnidadesPM->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposUnidadesPM->getDescripcion() . "\",
                       Habilitado =
                        \"" . $TiposUnidadesPM->getHabilitado() . "\"
                    WHERE ID =
                    " . $TiposUnidadesPM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposUnidadesPM): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposUnidadesPM ';
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
