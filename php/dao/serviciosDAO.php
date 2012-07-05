<?php

class serviciosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    	function getByCodigo($codigo) {

        $sql = 'SELECT * from ServiciosPM WHERE Codigo = "' . $codigo . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Servicios = new servicios();
        $Servicios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Servicios;
    }

    function save($newServicios) {
        $servicios = new servicios();
        $servicios = $newServicios;
        $sql = "insert into ServiciosPM
                    ( Codigo , Nombre , Descripcion , Habilitado )
                    values (
                    '" . $servicios->getCodigo() . "' , 
                    '" . $servicios->getNombre() . "' , 
                    '" . $servicios->getDescripcion() . "' , 
                    " . $servicios->getHabilitado() . "                   
	);";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (save Servicios): ' . mssql_get_last_message() . '<br>' . $sql;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from ServiciosPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Servicios = new servicios();
        $Servicios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Servicios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Servicios;
    }

    function gets() {

        $sql = 'SELECT * from ServiciosPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Servicios = new servicios();
            $Servicios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Servicios;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ServiciosPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newServicios) {
        $Servicios = new Servicios();
        $Servicios = $newServicios;

        $sql = "UPDATE
                    ServiciosPM
                    SET
                        Codigo =
                        \"" . $Servicios->getCodigo() . "\",
                        Nombre =
                        \"" . $Servicios->getNombre() . "\",
                       Descripcion =
                       \"" . $Servicios->getDescripcion() . "\",
                       Habilitado =
                        \"" . $Servicios->getHabilitado() . "\"
                    WHERE ID =
                    " . $Servicios->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateServicios): ' . mssql_get_last_message();
            return false;
        }

        return true;
    }

    function total($campo,$tipoBusqueda,$valor) {

        $sql = 'select count(*) from ServiciosPM ';
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

    function filtro($campo, $tipoBusqueda, $valor) {
        $sql = "select * from ServiciosPM ";
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
            $Servicios = new Servicios();
            $Servicios->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Servicios->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Servicios;
        }
        return $lista;
        
    }

}

?>
