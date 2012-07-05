<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class estadosfumigacionDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newEstadoFumigacion) {


        $querty = "insert into EstadosFumigacionPM
                    (Nombre)
                    values(
					\"" . $newEstadoFumigacion->getNombre() . "\"
	)";



        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from EstadosFumigacionPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $newEstadoFumigacion = new estadosfumigacion();
        $newEstadoFumigacion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newEstadoFumigacion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newEstadoFumigacion;
    }

    function gets() {

        $sql = 'SELECT * from EstadosFumigacionPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newEstadoFumigacion = new estadosfumigacion();
            $newEstadoFumigacion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoFumigacion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoFumigacion;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from EstadosFumigacionPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newEstadoFumigacion) {

        $EstadoFumigacion = $newEstadoFumigacion;

        $querty = "UPDATE
                    EstadosFumigacionPM
                    SET
						Nombre =
                        \"" . $EstadoFumigacion->getNombre() . "\"						
                       
                    WHERE ID =
                    " . $EstadoFumigacion->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function getsbybuscar($campo, $tipob, $valor) {
        $sql = 'SELECT * from EstadosFumigacionPM ';
        $where = ' where 1=1 ';

        if ($tipob == "parte") {
            $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
        } else {
            $where .= ' and ' . $campo . ' = "' . $valor . '"';
        }


        $sql.=$where;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newEstadoFumigacion = new estadosfumigacion();
            $newEstadoFumigacion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoFumigacion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoFumigacion;
        }
        return $lista;
    }

    function total() {

        $sql = 'select count(*) from EstadosFumigacionPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>