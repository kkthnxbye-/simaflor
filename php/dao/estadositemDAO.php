<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class estadositemDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newEstadoItem) {


        $querty = "insert into EstadosItemPM
                    (Nombre)
                    values(
					\"" . $newEstadoItem->getNombre() . "\"
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

        $sql = 'SELECT * from EstadosItemPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $newEstadoItem = new estadositem();
        $newEstadoItem->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newEstadoItem->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newEstadoItem;
    }

    function gets() {

        $sql = 'SELECT * from EstadosItemPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newEstadoItem = new estadositem();
            $newEstadoItem->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoItem->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoItem;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from EstadosItemPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newEstadoItem) {

        $EstadoItem = $newEstadoItem;

        $querty = "UPDATE
                    EstadosItemPM
                    SET
						Nombre =
                        \"" . $EstadoItem->getNombre() . "\"						
                       
                    WHERE ID =
                    " . $EstadoItem->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function getsbybuscar($campo, $tipob, $valor) {
        $sql = 'SELECT * from EstadosItemPM ';
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
            $newEstadoItem = new estadositem();
            $newEstadoItem->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoItem->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoItem;
        }
        return $lista;
    }

    function total() {

        $sql = 'select count(*) from EstadosItemPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>