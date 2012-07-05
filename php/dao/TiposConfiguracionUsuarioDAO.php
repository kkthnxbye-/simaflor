<?php

class TiposConfiguracionUsuarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposConfiguracionUsuario) {
        $TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
        $TiposConfiguracionUsuario = $newTiposConfiguracionUsuario;
        $sql = "insert into TiposConfiguracionUsuario
                    (Codigo,Nombre,Descripcion,Habilitado)
                    values (
                    '" . $TiposConfiguracionUsuario->getCodigo() . "',
					'" . $TiposConfiguracionUsuario->getNombre() . "',
					'" . $TiposConfiguracionUsuario->getDescripcion() . "',
                     " . $TiposConfiguracionUsuario->getHabilitado() . "                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposConfiguracionUsuario): <br>' . $sql.'<br>'. mssql_get_last_message();
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposConfiguracionUsuario WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
        $TiposConfiguracionUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposConfiguracionUsuario;
    }

    function getById($id) {

        $sql = 'SELECT * from TiposConfiguracionUsuario WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
        $TiposConfiguracionUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionUsuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposConfiguracionUsuario;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposConfiguracionUsuario ';

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
            $TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
            $TiposConfiguracionUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionUsuario->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionUsuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposConfiguracionUsuario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposConfiguracionUsuario WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newTiposConfiguracionUsuario) {
        $TiposConfiguracionUsuario = new TiposConfiguracionUsuario();
        $TiposConfiguracionUsuario = $newTiposConfiguracionUsuario;

        $sql = "UPDATE
                    TiposConfiguracionUsuario
                    SET
                        Codigo =
                        \"" . $TiposConfiguracionUsuario->getCodigo() . "\",
                        Nombre =
                        \"" . $TiposConfiguracionUsuario->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposConfiguracionUsuario->getDescripcion() . "\",
                       Habilitado =
                        \"" . $TiposConfiguracionUsuario->getHabilitado() . "\"
                    WHERE ID =
                    " . $TiposConfiguracionUsuario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposConfiguracionUsuario): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposConfiguracionUsuario ';
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
